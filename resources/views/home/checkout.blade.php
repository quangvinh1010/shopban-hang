@extends('layout')

@section('title', 'Thanh Toán')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid pt-5" style="margin-top: 100px; margin-bottom: 20px">
        <div class="row justify-content-center">
            <!-- Thêm viền bao quanh -->
            <div class="col-lg-8 border border-secondary rounded p-4">
                <div class="">
                    <!-- Mẫu Địa chỉ thanh toán -->
                    <div class="col-lg-12">
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-4">
                                <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Họ và Tên</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ old('name', $auth->name) }}">
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Địa chỉ</label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                                            name="address" value="{{ old('address', $auth->address) }}">
                                        @error('address')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name="email" value="{{ old('email', $auth->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name="phone" value="{{ old('phone', $auth->phone) }}">
                                        @error('phone')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card border-secondary mb-5">
                                <div class="card-footer border-secondary bg-transparent">
                                    <button type="submit"
                                        class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                                        Đặt Hàng
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tóm tắt đơn hàng -->

                </div>
            </div>
        </div>
    </div>
@endsection
