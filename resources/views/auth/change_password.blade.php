@extends('layout')

@section('title', 'Đổi Mật Khẩu')

@section('content')
    

    <section class="vh-100" style="margin-top: 100px; margin-bottom: 100px">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6">
                    <div class="card shadow-lg rounded-lg" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form action="{{ route('check-change-password') }}" method="POST">
                                @csrf

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-key fa-2x me-3" style="color: #ff6219; margin-right: 30px"></i>
                                    <span class="h1 fw-bold mb-0" style="font-family: 'Montserrat', sans-serif; color: #2c3e50;">Đổi Mật Khẩu</span>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="form-outline mb-4">
                                    <input 
                                        name="old_password" 
                                        type="password" 
                                        id="old_password" 
                                        class="form-control form-control-lg @error('old_password') is-invalid @enderror" 
                                        required 
                                    />
                                    <label class="form-label" for="old_password">Mật Khẩu Hiện Tại</label>
                                    @error('old_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input 
                                        name="password" 
                                        type="password" 
                                        id="password" 
                                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                        required 
                                    />
                                    <label class="form-label" for="password">Mật Khẩu Mới</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input 
                                        name="password_confirmation" 
                                        type="password" 
                                        id="password_confirmation" 
                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" 
                                        required 
                                    />
                                    <label class="form-label" for="password_confirmation">Xác Nhận Mật Khẩu Mới</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block w-100" type="submit">
                                        Đổi Mật Khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
