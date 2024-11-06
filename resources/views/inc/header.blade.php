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
        <a class="navbar-brand" href="index.html">Vnshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="{{ url('products') }}">Shop</a>
                  

                </li>
                <li class="nav-item active"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
                <div class="col-lg-6 col-6 text-left">
                    <form action="{{ route('home.search') }}" method="GET">
                        <div class="input-group" style="margin-top: 9px">
                            <input type="text" name="search" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <li class="nav-item cta cta-colored"><a href="{{ url('cart') }}" class="nav-link"><span
                            class="icon-shopping_cart"></span></a></li>\


                @if (Auth::check())
                    <li class="nav-item cta cta-colored">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <span class="fa-solid fa-right-from-bracket"></span>
                        </a>
                    </li>
                @else
                    <li class="nav-item cta cta-colored">
                        <a href="{{ route('login') }}" class="nav-link">
                            <span class="fa-solid fa-user"></span>
                        </a>
                    </li>
                @endif




            </ul>

        </div>
    </div>
</nav>
