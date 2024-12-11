@extends('layout')

@section('title', 'Đăng ký')

@section('content')
<section class="vh-100" style="margin-top: 100px; margin-bottom: 200px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-6">
                <div class="card shadow-lg rounded-lg" style="border-radius: 1.5rem;">
                    <div class="card-body p-5 text-black">
                        <form action="" method="POST">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0" style="font-family: 'Montserrat', sans-serif; color: #2c3e50;">Đăng ký tài khoản</span>
                            </div>

                            <!-- Mật khẩu và xác nhận mật khẩu -->
                            <div class="">
                                <div class="">
                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-outline mb-4">
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
