@extends('admin.layout')

@section('content')
    <h3>Chỉnh sửa Đơn Hàng</h3>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Tên Người Dùng</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $order->name) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $order->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Địa Chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $order->address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật Đơn Hàng</button>
    </form>
@endsection
