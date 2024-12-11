<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin'); // Role middleware ensures only admins can access
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItem::with('product', 'order')->get();
        return view('admin.orderItems.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('admin.orderItems.create', compact('products', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem = OrderItem::create($validated);

        return redirect()->route('admin.orderItems.index')
            ->with('message', $orderItem ? 'Tạo thành công!' : 'Tạo không thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $products = Product::all();
        $orders = Order::all();

        return view('admin.orderItems.edit', compact('orderItem', 'products', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($validated);

        return redirect()->route('admin.orderItems.index')
            ->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $deleted = $orderItem->delete();

        return redirect()->route('admin.orderItems.index')
            ->with('message', $deleted ? 'Đã xóa thành công!' : 'Xóa không thành công!');
    }
}
