@extends('layout')

@section('title', 'Đăng nhập')

@section('content')


<section class="vh-100" style="margin-top: 100px; margin-bottom: 100px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-6">
                <div class="card" style="border-radius: 1rem;">
                    <div class="">
                        
                        <div class="">
                            <div class="card-body p-4  text-black">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-key fa-2x me-3" style="color: #ff6219; margin-right: 20px"></i>
                                        <span class="h1 fw-bold mb-0">Đăng nhập</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập tài khoản của bạn</h5>

                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    <div class="form-outline mb-4">
                                        <input name="email" type="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" required />
                                        <label class="form-label" for="email">Địa chỉ email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="password" class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                                    </div>

                                    <a class="small text-muted" href="{{ route('auth.forgot_password') }}">Quên mật khẩu?</a>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <a href="{{ route('register') }}" style="color: #393f81;">Đăng ký ngay</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
