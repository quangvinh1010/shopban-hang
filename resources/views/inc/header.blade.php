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
						<a class="nav-link dropdown-toggle" href="{{ url('products') }}">shop</a>
						<!-- <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a> -->
						<div class="dropdown-menu" aria-labelledby="dropdown04">
						  <a class="dropdown-item" href="shopnam.html">Shop Nam</a>
						  <a class="dropdown-item" href="shopnu.html">Shop Nữ</a>
						  <a class="dropdown-item" href="shopdodoi.html">Shop Đồ Đôi</a>
						</div>
					</li>
					<li class="nav-item active"><a href="about.html" class="nav-link">About</a></li>
					<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
					<li class="nav-item"><a href="product-single.html" class="nav-link">Product-Single</a></li>
					<li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span
								class="icon-shopping_cart"></span>[0]</a></li>

				</ul>
			</div>
		</div>
	</nav>

