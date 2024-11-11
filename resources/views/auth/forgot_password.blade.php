@extends('layout')

@section('title', 'Login')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/backgout.png');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span></p>
                
				<h1 class="mb-0 bread">Forgot Password</h1>
			</div>
		</div>
	</div>
</div>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="row g-0">

                        <div class="col-md-6 col-lg-7 d-flex align-items-center justify-content-center"
                            style="height: 100vh;">
                            <div class="card-body p-4 p-lg-5 text-black">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('forgot_password') }}" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Logo</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forgot Password</h5>

                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    <div class="form-outline mb-4">
                                        <input name="email" type="email" id="email"
                                            class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">send email</button>
                                    </div>

                                    
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>

@endsection
