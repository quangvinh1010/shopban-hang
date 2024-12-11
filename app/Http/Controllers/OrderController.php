<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::with('customer')
            ->where('customer_id', auth('cus')->id())
            ->get();

        $categories = Category::all();
        $vouchers = Voucher::all();
        return view('orders.index', compact('orders', 'categories', 'vouchers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->user()->id; // Lấy ID người dùng
        $order->phone = $request->phone;
        $order->status = 'pending';
        $order->code = 'ORD-' . strtoupper(Str::random(8)); // Tạo mã đơn hàng
        $order->save();

        return response()->json([
            'message' => 'Order created successfully!',
            'order' => $order,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Update the order with the validated data
        $order->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('orders.index')->with('message', 'Đơn hàng đã được cập nhật.');
    }

    public function checkout(Request $req)
    {
        // Các bước xử lý thanh toán khác...

        // Nếu có voucher được áp dụng
        $voucherCode = session('voucher_code');
        if ($voucherCode) {
            $voucher = Voucher::where('code', $voucherCode)->first();

            if ($voucher) {
                $voucher->increment('used_count');
            }
        }

        // Xóa voucher khỏi session sau khi thanh toán thành công
        session()->forget(['voucher_code', 'voucher_discount', 'newTotalAmount']);

        return redirect()->route('checkout.success')->with('success', 'Thanh toán thành công!');
    }
}
