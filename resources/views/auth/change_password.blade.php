@extends('layout')

@section('title', 'Change Password')

@section('content')
<div class="container-fluid bg-secondary mb-5"
    style="background-image: url('{{ asset('images/bgr2.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Change Password</h1>
        <div class="d-inline-flex">
            <!-- Add content here -->
        </div>
    </div>
</div>

<section class="vh-100" style="margin-top: 100px; margin-bottom: 100px">
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


                                <form action="{{ route('check-change-password') }}" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change Password</h5>

                                    <div class="form-outline mb-4">
                                        <input name="old_password" type="password" id="old_password"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="old_password">Current Password</label>
                                        @error('old_password')
                                            <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="password"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">New Password</label>
                                        @error('password')
                                            <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="confirm_password" type="password" id="confirm_password"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="confirm_password">Confirm New Password</label>
                                        @error('confirm_password')
                                            <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Change Password</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
