<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form action="" method="post">
                                @csrf
                                @if (Session::has('no'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('no') }}
                                    </div>
                                @endif     
                                <div class="form-group">
                                    <label class="label" for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <small class="help-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="label" for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-lock"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <small class="help-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked aria-label="Remember me"> Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                                </div>

                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Not a member?</span>
                                    <a href="register.html" class="text-black text-small">Create new account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>

</html>
