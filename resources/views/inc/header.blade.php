<div class="py-1 bg-black">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+84 345 666 666</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">vnshop@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Giao hàng trong 3-5 ngày làm việc & Trả hàng miễn phí</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">VnShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('home') }}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item dropdown">
                    <a href="{{ url('products') }}" class="nav-link">Cửa hàng</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ url('products?category=' . $category->id) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                

                <li class="nav-item active"><a href="{{ url('about') }}" class="nav-link">Giới thiệu</a></li>
                {{-- <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link">Blog</a></li> --}}
                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Liên hệ</a></li>

                <style>
                    .input-group-append .input-group-text:hover {
                        background-color: rgb(173, 173, 173) !important;
                        color: #000 !important;
                    }
                </style>
                <div class="col-lg-4 col-6" style="margin-left: 100px">
                    <form action="{{ route('home.search') }}" method="GET">
                        <div class="input-group mt-2 mb-1 shadow-sm rounded">
                            <input type="text" name="search" class="form-control border-0"
                                placeholder="Tìm kiếm sản phẩm"
                                style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-primary text-white border-0"
                                    style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>



                <li class="nav-item ml-auto">
                    <a href="{{ url('cart') }}" class="nav-link cart-link">
                        <span class="icon-shopping_cart" style="font-size: 30px;">
                            {{-- {{$carts->sum('quantity')}} --}}
                        </span>
                    </a>
                </li>


                {{-- <li class="nav-item">
                    @if (Auth('cus')->check())
                    <li class="nav-item cta cta-colored user-menu" style="margin-right: -50px">
                        <a href="{{ route('profile') }}" class="user-name">
                            <i class="fa-solid fa-user" style="margin-right: 5px;"></i> 
                            {{ Auth('cus')->user()->name }}
                        </a>
                        <!-- Submenu -->
                        <ul class="submenu" style="margin-right: 20px">
                            <li><a href="{{ route('profile') }}">Hồ sơ</a></li>
                            <li><a href="{{ route('orders.index') }}">Đơn hàng</a></li>
                            <li><a href="{{ route('change_password') }}">Đổi mật khẩu</a></li>
                            <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item cta cta-colored">
                        <a href="{{ route('login') }}" class="nav-link" style="margin-top: 5px;">
                            <span class="fa-solid fa-user" style="font-size: 25px; color: black; margin-right: -30px;"></span>
                        </a>
                    </li>
                    @endif
                </li> --}}


                <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="Profile image">
                            
                            <!-- Check if user is authenticated -->
                            @if(Auth('cus')->check())
                                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth('cus')->user()->name }}</p>
                                <p class="font-weight-light text-muted mb-0">{{ Auth('cus')->user()->email }}</p>
                            @else
                                <p class="mb-1 mt-3 font-weight-semibold">Khách mời</p>
                                <p class="font-weight-light text-muted mb-0">Chưa đăng nhập</p>
                            @endif
                        </div>
                        
                        <!-- Menu items -->
                        @if(Auth('cus')->check())
                            <a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ</a>
                            <a class="dropdown-item" href="{{ route('orders.index') }}">Đơn hàng</a>
                            <a class="dropdown-item" href="{{ route('change_password') }}">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a>
                        @endif
                    </div>
                </li>
                



            </ul>
        </div>
    </div>
</nav>
