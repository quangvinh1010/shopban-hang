<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Str;



class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $auth = auth('cus')->user();
        $categories = Category::all();
        return view('home.checkout', compact('auth', 'categories'));
    }

    public function post_checkout(Request $rep)
{
    $auth = auth('cus')->user();

    $rep->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $data = $rep->only(['name', 'email', 'phone', 'address']);
    $data['customer_id'] = $auth->id;
    $data['status'] = 0;
    $data['token'] = Str::random(40);

    try {
        \DB::transaction(function () use ($auth, $data) {
            // Lưu thông tin đơn hàng
            $order = Order::create($data);

            // Lưu các sản phẩm trong giỏ hàng vào bảng `order_items`
            $orderItems = [];
            foreach ($auth->carts as $cart) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];
            }
            OrderItem::insert($orderItems);

            // Xóa giỏ hàng sau khi đặt hàng thành công
            Cart::where('customer_id', $auth->id)->delete();

            // Gửi email xác nhận đơn hàng
            Mail::to($auth->email)->queue(new OrderMail($order->load('details.product'), $order->token));
        });

        // Xóa dữ liệu liên quan đến giỏ hàng trong session
        session()->forget(['cart_items', 'totalAmount', 'voucher_code', 'discount', 'newTotalAmount']);

        return redirect()->route('home.index')->with('ok', 'Thanh toán đơn hàng thành công.');
    } catch (\Exception $e) {
        \Log::error('Order Processing Failed: ' . $e->getMessage());
        return redirect()->route('home.index')->with('no', 'Đã xảy ra lỗi, vui lòng thử lại.');
    }
}



    public function verify($token)
    {
        $order = Order::where('token', $token)->first();

        if ($order) {
            $order->update([
                'token' => null,    // Xóa token sau khi xác minh
                'status' => 1,      // Đặt trạng thái thành "đã xác minh" (1)
            ]);

            return redirect()->route('home.index')->with('ok', 'Xác nhận đơn hàng thành công!');
        }

        return redirect()->route('home.index')->with('no', 'Không tìm thấy đơn hàng.');
    }
}
