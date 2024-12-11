@extends('layout')

@section('title', 'Hồ sơ')

@section('content')
<section class="vh-100" style="margin-top: 100px; margin-bottom: 200px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-7">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-user fa-2x me-3" style="color: #ff6219; margin-right: 30px"></i>
                                <span class="h1 fw-bold mb-0">Hồ sơ của bạn</span>
                            </div>
                            
                            <div class="form-outline mb-4">
                                <input 
                                    name="name" 
                                    value="{{ old('name', $auth->name) }}" 
                                    type="text" 
                                    id="name" 
                                    class="form-control form-control-lg" 
                                    aria-label="Họ tên" 
                                    required />
                                <label class="form-label" for="name">Họ tên</label>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input 
                                    name="email" 
                                    value="{{ old('email', $auth->email) }}" 
                                    type="email" 
                                    id="email" 
                                    class="form-control form-control-lg" 
                                    aria-label="Email" 
                                    required />
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input 
                                    name="phone" 
                                    value="{{ old('phone', $auth->phone) }}" 
                                    type="text" 
                                    id="phone" 
                                    class="form-control form-control-lg" 
                                    aria-label="Số điện thoại" 
                                    required />
                                <label class="form-label" for="phone">Số điện thoại</label>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input 
                                    name="address" 
                                    value="{{ old('address', $auth->address) }}" 
                                    type="text" 
                                    id="address" 
                                    class="form-control form-control-lg" 
                                    aria-label="Địa chỉ" 
                                    required />
                                <label class="form-label" for="address">Địa chỉ</label>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <select 
                                    name="gender" 
                                    class="form-control" 
                                    aria-label="Giới tính" 
                                    required>
                                    <option value="">Chọn giới tính</option>
                                    <option value="1" {{ old('gender', $auth->gender) == 1 ? 'selected' : '' }}>Nam</option>
                                    <option value="0" {{ old('gender', $auth->gender) == 0 ? 'selected' : '' }}>Nữ</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input 
                                    name="password" 
                                    type="password" 
                                    id="password" 
                                    class="form-control form-control-lg" 
                                    placeholder="Nhập mật khẩu" 
                                    aria-label="Mật khẩu" />
                                <label class="form-label" for="password">Mật khẩu</label>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button 
                                    class="btn btn-dark btn-lg btn-block" 
                                    type="submit">
                                    Cập nhật hồ sơ
                                </button>
                            </div>

                            @if(session('ok'))
                                <div class="alert alert-success">{{ session('ok') }}</div>
                            @endif
                            @if(session('no'))
                                <div class="alert alert-danger">{{ session('no') }}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Đảm bảo khoảng cách dưới cùng đủ lớn để không bị trùng -->
<div style="height: 120px;"></div>
@endsection
