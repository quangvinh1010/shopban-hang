@extends('layout')

@section('title', 'Đăng ký')

@section('content')

<section class="vh-100" style="margin-top: 100px; margin-bottom: 200px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow-lg rounded-lg" style="border-radius: 1.5rem;">
                    <div class="card-body p-5 text-black">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-user fa-2x me-3" style="color: #ff6219; margin-right: 25px"></i>
                                <span class="h1 fw-bold mb-0" style="font-family: 'Montserrat', sans-serif; color: #2c3e50;">Đăng ký</span>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Hàng đầu tiên: Họ và tên -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-outline">
                                        <input name="name" type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
                                        <label class="form-label" for="name">Họ và tên</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Hàng thứ hai: Email và Số điện thoại -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="email" type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                                        <label class="form-label" for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="phone" type="tel" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required />
                                        <label class="form-label" for="phone">Số điện thoại</label>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Hàng thứ ba: Giới tính và Địa chỉ -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <select name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror" required>
                                            <option value="">Chọn giới tính</option>
                                            <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Nam</option>
                                            <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                        <label class="form-label" for="gender">Giới tính</label>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="address" type="text" id="address" class="form-control form-control-lg @error('address') is-invalid @enderror" value="{{ old('address') }}" required />
                                        <label class="form-label" for="address">Địa chỉ</label>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Hàng thứ tư: Mật khẩu và Xác nhận mật khẩu -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="password" type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <input name="confirm_password" type="password" id="confirm_password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror" required />
                                        <label class="form-label" for="confirm_password">Xác nhận mật khẩu</label>
                                        @error('confirm_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Nút đăng ký -->
                            <div class="pt-1 mb-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block w-100">
                                    Đăng ký
                                </button>
                            </div>

                            <!-- Liên kết đến trang đăng nhập -->
                            <div class="d-flex justify-content-center">
                                <p class="mb-0">Đã có tài khoản? <a href="{{ route('login') }}" class="text-primary">Đăng nhập tại đây</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
