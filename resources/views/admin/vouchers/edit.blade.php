@extends('admin.layout')

@section('title', 'Chỉnh sửa Voucher')

@section('content')

    <h1>Chỉnh sửa Voucher</h1>

    <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST" class="form" role="form">
        @csrf
        @method('PUT')  <!-- PUT method for updating -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Mã Voucher</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $voucher->code) }}" placeholder="Mã Voucher" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discount_amount">Số tiền giảm giá</label>
                    <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{ old('discount_amount', $voucher->discount_amount) }}" placeholder="Số tiền giảm giá" step="0.01" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discount_percent">Phần trăm giảm giá</label>
                    <input type="number" name="discount_percent" id="discount_percent" class="form-control" value="{{ old('discount_percent', $voucher->discount_percent) }}" placeholder="Phần trăm giảm giá" min="0" max="100" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usage_limit">Số lần sử dụng</label>
                    <input type="number" name="usage_limit" id="usage_limit" class="form-control" value="{{ old('usage_limit', $voucher->usage_limit) }}" placeholder="Số lần sử dụng" min="1" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="valid_from">Ngày bắt đầu</label>
                    <input type="date" name="valid_from" id="valid_from" class="form-control" value="{{ old('valid_from', $voucher->valid_from) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="valid_to">Ngày hết hạn</label>
                    <input type="date" name="valid_to" id="valid_to" class="form-control" value="{{ old('valid_to', $voucher->valid_to) }}" required>
                </div>
            </div>
           
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Lưu Voucher
            </button>
        </div>
    </form>

@endsection
