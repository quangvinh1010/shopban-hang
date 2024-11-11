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
                        <span class="text">Giao hàng 3-5 ngày làm việc & Trả hàng miễn phí </span>
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
                <li class="nav-item"><a href="{{ url('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a href="{{ url('products') }}" class="nav-link">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('products') }}"></a>
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ url('products?category=' . $category->id) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </li>


                <li class="nav-item active"><a href="{{ url('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link">Blog</a>
                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>

                <div class="col-lg-4 col-6" style="margin-left: 130px">
                    <form action="{{ route('home.search') }}" method="GET">
                        <div class="input-group mt-2 mb-1 shadow-sm rounded">
                            <input type="text" name="search" class="form-control border-0"
                                placeholder="Search for products"
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

                <li class="nav-item cta cta-colored">
                    <a href="{{ url('cart') }}" class="nav-link" style="margin-top: auto">
                        <span class="icon-shopping_cart" style=" color: white; font-size: 30px; "></span>
                    </a>
                </li>


                @if (Auth('cus')->check())
                    <li class="nav-item cta cta-colored" style="position: relative; margin-top: 1rem;">
                        <a href="{{ route('profile') }}">{{ Auth('cus')->user()->name }}</a>

                        <!-- Submenu -->
                        <ul class="submenu">
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                            <li><a href="{{ route('change_password') }}">Change Password</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item cta cta-colored">
                        <a href="{{ route('login') }}" class="nav-link" style="margin-top: 5px">
                            <span class="fa-solid fa-user" style="font-size: 25px"></span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
