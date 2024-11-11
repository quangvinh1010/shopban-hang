@extends('layout')

@section('title', 'Register')

@section('content')
<div class="container-fluid bg-secondary mb-5" style="background-image: url('{{ asset('images/bgr2.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Register</h1>
    </div>
</div>

<section class="vh-100" style="margin-top: 100px; margin-bottom: 200px">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow-lg rounded-lg" style="border-radius: 1.5rem;">
                    <div class="card-body p-5 text-black">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0" style="font-family: 'Montserrat', sans-serif; color: #2c3e50;">Register</span>
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

                            <!-- First Row: Name, Email, Phone -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input name="name" type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
                                        <label class="form-label" for="name">Full Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input name="email" type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                                        <label class="form-label" for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Second Row: Phone, Address, Gender -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input name="phone" type="tel" id="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required />
                                        <label class="form-label" for="phone">Phone Number</label>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input name="address" type="text" id="address" class="form-control form-control-lg @error('address') is-invalid @enderror" value="{{ old('address') }}" required />
                                        <label class="form-label" for="address">Address</label>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Gender and Password Section -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <select name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror" required>
                                            <option value="">Select Gender</option>
                                            <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                                            <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Female</option>
                                        </select>
                                        <label class="form-label" for="gender">Gender</label>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required />
                                        <label class="form-label" for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="confirm_password" type="confirm_password" id="confirm_password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror" required />
                                <label class="form-label" for="confirm_password">Confirm Password</label>
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-1 mb-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block w-100">
                                    Register
                                </button>
                            </div>

                            <!-- Link to login page -->
                            <div class="d-flex justify-content-center">
                                <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary">Login here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
