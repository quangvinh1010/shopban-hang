<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $categories = Category::all();
        $products = Product::all();
        $vouchers = Voucher::all();
        $carts = Cart::where('customer_id', auth('cus')->id())->get();

        return view('cart.index', compact('carts', 'categories', 'products', 'vouchers'));
    }

    public function add(Product $product, Request $req)
    {
        // Ensure the quantity is an integer, even if not provided
        $quantity = $req->quantity ? (int) floor($req->quantity) : 1;

        // Get the customer ID
        $cus_id = auth('cus')->id();

        // Check if the product already exists in the cart for the customer
        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            // If the product exists, increment the quantity
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
        } else {
            // Prepare the data for the new cart entry
            $data = [
                'customer_id' => $cus_id,
                'product_id' => $product->id,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity
            ];

            // Try to create a new cart entry
            Cart::create($data);
        }

        // Update session with the cart items
        $this->updateCartSession($cus_id);

        return redirect()->route('cart.index')->with('ok', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    private function updateCartSession($cus_id)
    {
        $carts = Cart::where('customer_id', $cus_id)->get();
        $cartItems = [];
        $totalAmount = 0;

        foreach ($carts as $item) {
            $cartItems[] = [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ];
            $totalAmount += $item->price * $item->quantity;
        }

        // Store cart items and total amount in the session
        session(['cart_items' => $cartItems, 'totalAmount' => $totalAmount]);
    }


    public function update(Product $product, Request $req)
    {
        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->update([
                'quantity' => $quantity
            ]);

            return redirect()->route('cart.index')->with('ok', 'Cập nhật số lượng sản phẩm vào giỏ hàng thành công');
        }
        return redirect()->back()->with('no', 'Đã xảy ra lỗi, vui lòng thử lại');
    }


    public function delete($product_id)
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id
        ])->delete();

        return redirect()->back()->with('ok', 'Sản phẩm đã bị xóa khỏi giỏ hàng');
    }


    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
        ])->delete();

        return redirect()->back()->with('ok', 'Đã xóa tất cả sản phẩm khỏi giỏ hàng');
    }

    public function checkout(Request $request)
    {
        $cus_id = auth('cus')->id();

        // Xử lý thanh toán (tùy theo logic thanh toán của bạn)
        // Ví dụ: Lưu thông tin đơn hàng, xử lý qua cổng thanh toán...

        // Sau khi thanh toán thành công, xóa tất cả sản phẩm trong giỏ hàng
        Cart::where('customer_id', $cus_id)->delete();

        // Xóa session liên quan đến giỏ hàng
        session()->forget(['cart_items', 'totalAmount', 'voucher_code', 'discount', 'newTotalAmount']);

        // Chuyển hướng đến trang cảm ơn hoặc thông báo thanh toán thành công
        return redirect()->route('cart.thankYou')->with('ok', 'Thanh toán thành công! Giỏ hàng của bạn đã được xóa.');
    }


    public function applyVoucher(Request $req)
    {
        $cus_id = auth('cus')->id();
        $voucherCode = $req->input('voucher_code');

        // Tìm voucher
        $voucher = Voucher::where('code', $voucherCode)->first();

        if (!$voucher) {
            return redirect()->back()->with('no', 'Mã voucher không hợp lệ');
        }

        // Kiểm tra thời hạn
        if ($voucher->valid_to && $voucher->valid_to < now()) {
            return redirect()->back()->with('no', 'Phiếu giảm giá này đã hết hạn');
        }

        // Kiểm tra giới hạn sử dụng
        if ($voucher->usage_limit !== null && $voucher->used_count >= $voucher->usage_limit) {
            return redirect()->back()->with('no', 'Phiếu giảm giá này đã được sử dụng hết');
        }

        // Tính toán giảm giá
        $totalAmount = session('totalAmount', 0);
        if ($totalAmount <= 0) {
            return redirect()->back()->with('no', 'Không có sản phẩm trong giỏ hàng để áp dụng mã giảm giá');
        }

        $discount = 0;
        if ($voucher->discount_amount) {
            $discount = $voucher->discount_amount;
        } elseif ($voucher->discount_percent) {
            $discount = ($totalAmount * $voucher->discount_percent) / 100;
        }
        $discount = min($discount, $totalAmount);

        $newTotalAmount = $totalAmount - $discount;

        // Lưu vào session
        session([
            'voucher_code' => $voucherCode,
            'voucher_discount' => $discount,
            'newTotalAmount' => $newTotalAmount,
            'voucher' => $voucher // Store the voucher data in the session
        ]);

        // Giảm số lần sử dụng
        $voucher->increment('used_count');  // This will increase the used_count by 1

        return redirect()->back()->with('ok', 'Voucher được áp dụng thành công');
    }
}
