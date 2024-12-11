@extends('layout')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="container" style="margin-top: 100px; margin-bottom: 20px">
        <h5>Đơn hàng của bạn</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Người Dùng</th>
                        <th>Ngày Tạo</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>
                                @if ($order->status == 'pending')
                                    Chưa xác nhận
                                @elseif ($order->status == 'confirmed')
                                    Đã xác nhận
                                @elseif ($order->status == 'shipped')
                                    Đã giao hàng
                                @else
                                    {{ $order->status }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
