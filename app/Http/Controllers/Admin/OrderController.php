<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

     // Thay đổi trạng thái của đơn hàng
     public function changeStatus(Request $request, $orderId)
     {
         $order = Order::find($orderId);
 
         if ($order) {
             // Kiểm tra nếu trạng thái có trong yêu cầu và hợp lệ
             $status = $request->input('status');
             if (in_array($status, [
                 Order::STATUS_PENDING,
                 Order::STATUS_CONFIRMED,
                 Order::STATUS_SHIPPED,
                 Order::STATUS_COMPLETED,
                 Order::STATUS_CANCELLED,
             ])) {
                 $order->status = $status;
                 $order->save();
 
                 return redirect()->route('admin.orders.index')->with('ok', 'Cập nhật trạng thái đơn hàng thành công.');
             } else {
                 return redirect()->route('admin.orders.index')->with('no', 'Trạng thái không hợp lệ.');
             }
         }
 
         return abort(404, 'Không tìm thấy đơn hàng.');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,rejected,completed',
            'user_id' => 'required|exists:users,id',
        ]);

        $order = Order::create($request->only(['code', 'status', 'user_id']));

        $message = $order ? 'Create success!' : 'Create failed!';
        return redirect()->route('orders.index')->with('message', $message);
    }


    /**
     * Approve the specified order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();
    
        return redirect()->back()->with('message', 'Order approved successfully.');
    }
    

    /**
     * Update the status of the specified order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('message', 'Order status updated successfully!');
    }
}
