@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Tạo Voucher</h2>

    <form action="{{ route('admin.vouchers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="code">Mã Voucher:</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
            @error('code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount_amount">Số Tiền Giảm Giá:</label>
            <input type="number" class="form-control" id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}" step="0.01">
            @error('discount_amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount_percent">Phần Trăm Giảm Giá:</label>
            <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{ old('discount_percent') }}" min="0" max="100">
            @error('discount_percent')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="valid_from">Ngày Bắt Đầu:</label>
            <input type="date" class="form-control" id="valid_from" name="valid_from" value="{{ old('valid_from') }}">
            @error('valid_from')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="valid_to">Ngày Hết Hạn:</label>
            <input type="date" class="form-control" id="valid_to" name="valid_to" value="{{ old('valid_to') }}">
            @error('valid_to')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_limit">Số Lần Sử Dụng:</label>
            <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ old('usage_limit') }}" min="1">
            @error('usage_limit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tạo Voucher</button>
    </form>
</div>
@endsection
