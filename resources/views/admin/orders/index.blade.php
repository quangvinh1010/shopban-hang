@extends('admin.layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Thêm Đơn Hàng Mới</a>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã</th>
                    <th>Người Dùng</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at }}</td>
                        
                        <td>
                            <form action="{{ route('admin.orders.changeStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()">
                                    <option value="{{ App\Models\Order::STATUS_PENDING }}" {{ $order->status == App\Models\Order::STATUS_PENDING ? 'selected' : '' }}>Chưa xác nhận</option>
                                    <option value="{{ App\Models\Order::STATUS_CONFIRMED }}" {{ $order->status == App\Models\Order::STATUS_CONFIRMED ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="{{ App\Models\Order::STATUS_SHIPPED }}" {{ $order->status == App\Models\Order::STATUS_SHIPPED ? 'selected' : '' }}>Đang giao</option>
                                    <option value="{{ App\Models\Order::STATUS_COMPLETED }}" {{ $order->status == App\Models\Order::STATUS_COMPLETED ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="{{ App\Models\Order::STATUS_CANCELLED }}" {{ $order->status == App\Models\Order::STATUS_CANCELLED ? 'selected' : '' }}>Hủy bỏ</option>
                                </select>
                            </form>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
