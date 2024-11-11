<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Display the checkout page
    public function index()
    {
        $categories = Category::all();
        $total = $this->calculateCartTotal();
        $user = Auth::user(); // Get the authenticated user
        return view('home.checkout', compact('total', 'user', 'categories'));
    }

    // Handle the order placement request
    public function placeOrder(Request $request)
    {
        // Ensure the user is logged in before proceeding
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đặt hàng.');
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'nullable|string|max:255', // Optional
            'phone' => 'required|string|max:15',
            'code' => 'required|string|max:50',
            'receiver' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'email.required' => 'Vui lòng nhập email của bạn.',
            'receiver.required' => 'Vui lòng nhập tên người nhận.',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn.',
            'code.required' => 'Vui lòng nhập mã đơn hàng.',
        ]);
        

        try {
            DB::beginTransaction(); // Start a database transaction

            // Create a new order
            $order = new Order();
            $order->user_id = Auth::id();
            $order->code = $validatedData['code'];
            $order->email = $validatedData['email'];
            $order->phone = $validatedData['phone'];
            $order->total = $this->calculateCartTotal() + 10; // Total includes shipping
            $order->status = $validatedData['status'] ?? 'pending'; // Default status
            $order->receiver = $validatedData['receiver'];

            // Save order to database
            if (!$order->save()) {
                throw new \Exception('Could not save order.');
            }

            // Check if 'cart' session exists and is not empty
            $cart = $request->session()->get('cart');
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    if (is_array($item) && isset($item['product_id'])) {
                        $orderItem = new OrderItem();
                        $orderItem->order_id = $order->id;
                        $orderItem->product_id = $item['product_id'];
                        $orderItem->quantity = $item['quantity'];
                        $orderItem->price = $item['price'];

                        // Save the order item
                        if (!$orderItem->save()) {
                            throw new \Exception('Could not save order item.');
                        }
                    }
                }

                // Clear cart session after order placement
                $request->session()->forget('cart');

                DB::commit(); // Commit the transaction

                // Redirect user after successful order
                return redirect()->route('home.checkout')->with('success', 'Đặt hàng thành công!');
            } else {
                return redirect()->route('home.checkout')->with('error', 'Không có sản phẩm trong giỏ hàng.');
            }
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of error
            return redirect()->route('home.checkout')->with('error', 'Đặt hàng thất bại: ' . $e->getMessage());
        }
    }

    // Calculate the total price of the items in the cart
    private function calculateCartTotal()
    {
        $total = 0;
        if (session('cart')) {
            foreach (session('cart') as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}
