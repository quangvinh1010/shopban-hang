@extends('layout')

@section('title', 'Profile')

@section('content')
<section class="vh-100" style="margin-top: 100px; margin-bottom: 200px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Your Profile</span>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="name" value="{{ old('name', $auth->name) }}" type="text" id="name" class="form-control form-control-lg" required />
                                        <label class="form-label" for="name">Name</label>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="email" value="{{ old('email', $auth->email) }}" type="email" id="email" class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Email</label>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="phone" value="{{ old('phone', $auth->phone) }}" type="text" id="phone" class="form-control form-control-lg" required />
                                        <label class="form-label" for="phone">Phone</label>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="address" value="{{ old('address', $auth->address) }}" type="text" id="address" class="form-control form-control-lg" required />
                                        <label class="form-label" for="address">Address</label>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select One</option>
                                            <option value="1" {{ old('gender', $auth->gender) == 1 ? 'selected' : '' }}>Male</option>
                                            <option value="0" {{ old('gender', $auth->gender) == 0 ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="password" type="password" id="password" class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Your Password</label>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-dark btn-lg btn-block" type="submit">Update Profile</button>
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
        </div>
    </div>
</section>
@endsection
