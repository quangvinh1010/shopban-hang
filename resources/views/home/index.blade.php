@extends('layout')

@section('title', 'HOME')

@section('content')

<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item js-fullheight">
			<div class="overlay"></div>
			<div class="container-fluid p-0">
				<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
					data-scrollax-parent="true">
					<img class="one-third order-md-last img-fluid" src="images/ao-cap-gia-dinh.jpg" alt="">
					<div class="one-forth d-flex align-items-center ftco-animate"
						data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading">#New Arrival</span>
							<div class="horizontal">
								<h1 class="mb-4 mt-3">Áo đôi Hot Trenl</h1>
								<p class="mb-4">Đồ couple dễ thương vừa đẹp mắt vừa giúp gắn kết các bạn trẻ lại gần với nhau hơn.</p>

								<p><a href="#" class="btn-custom">Discover Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item js-fullheight">
			<div class="overlay"></div>
			<div class="container-fluid p-0">
				<div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
					data-scrollax-parent="true">
					<img class="one-third order-md-last img-fluid" src="images/quan-ao-doi-dep-soc-trang.jpg"
						alt="">
					<div class="one-forth d-flex align-items-center ftco-animate"
						data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading">#New Arrival</span>
							<div class="horizontal">
								<h1 class="mb-4 mt-3">Áo đôi trắng sọc</h1>
								<p class="mb-4">Áo thun trắng cổ tim kết hợp cùng quần short và váy kẻ cá tính.</p>

								<p><a href="#" class="btn-custom">Discover Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row no-gutters ftco-services">
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services p-4 py-md-5">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-bag"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Free Shipping</h3>
						<p>"Săn deal cực hời, giao hàng miễn phí!".</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services p-4 py-md-5">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Support Customer</h3>
						<p>"Chăm sóc khách hàng – Hỗ trợ từ sáng đến khuya!".</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services p-4 py-md-5">
					<div class="icon d-flex justify-content-center align-items-center mb-4">
						<span class="flaticon-payment-security"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Secure Payments</h3>
						<p>"Bảo mật thông tin – Thanh toán an toàn, tiện lợi!".</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Latest products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="row">
			@foreach($productList as $product)
			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">

				<div class="product d-flex flex-column">
					<a href="{{ route('products.show', $product->id) }}" class="img-prod"><img class="img-fluid" src="{{ url($product->img )}}"
							alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3">
						<div class="d-flex">
							<div class="cat">
								<span>Lifestyle</span>
							</div>
							<div class="rating">
								<p class="text-right mb-0">
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
								</p>
							</div>
						</div>
						<h3><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
						<div class="pricing">
							<p class="price"><span>{{ $product->price }}</span></p>
						</div>
						<div class="card-footer d-flex justify-content-between bg-light border">
							<a href="{{ route('products.show', $product->id) }}" class="btn btn-sm text-dark p-0" style="margin-top: 7px;">
								<i class="fas fa-eye text-primary mr-1"></i>View Detail
							</a>
							<form id="addToCartForm" method="POST" action="{{ route('cart.add') }}" class="d-inline">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<input id="hiddenQuantity" type="hidden" name="quantity" value="1">
								<button class="btn btn-primary btn-sm text-white p-2" type="submit" style="border-radius: 5px;">
									<i class="fas fa-shopping-cart mr-1"></i> Add To Cart
								</button>
							</form>

						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

</section>
<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="services-flow">
					<div class="services-2 p-4 d-flex ftco-animate">
						<div class="icon">
							<span class="flaticon-bag"></span>
						</div>
						<div class="text">
							<h3>Free Shipping</h3>
							<p class="mb-0">"Săn deal cực hời, giao hàng miễn phí!"</p>
						</div>
					</div>
					<div class="services-2 p-4 d-flex ftco-animate">
						<div class="icon">
							<span class="flaticon-heart-box"></span>
						</div>
						<div class="text">
							<h3>Valuable Gifts</h3>
							<p class="mb-0">"Mua hàng liền tay – Nhận quà mỗi ngày!"</p>
						</div>
					</div>
					<div class="services-2 p-4 d-flex ftco-animate">
						<div class="icon">
							<span class="flaticon-payment-security"></span>
						</div>
						<div class="text">
							<h3>All Day Support</h3>
							<p class="mb-0">"Luôn bên bạn – Hỗ trợ không ngừng nghỉ!"</p>
						</div>
					</div>
					<div class="services-2 p-4 d-flex ftco-animate">
						<div class="icon">
							<span class="flaticon-customer-service"></span>
						</div>
						<div class="text">
							<h3>All Day Support</h3>
							<p class="mb-0">"Chăm sóc khách hàng – Hỗ trợ từ sáng đến khuya!"</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="heading-section ftco-animate mb-5">
					<h2 class="mb-4">Khách hàng hài lòng của chúng tôi nói</h2>
					<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
				</div>
				<div class="carousel-testimony owl-carousel ftco-animate">
					<div class="item">
						<div class="testimony-wrap">
							<div class="user-img mb-4" style="background-image: url(images/avt1.jfif)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="row">
								<ul>
									@foreach ($posts as $post)
										<li>
											<h2>{{ $post->title }}</h2>
											<p>{{ $post->content }}</p> <!-- Hiển thị nội dung -->
											<p><a href="{{ route('posts.index', $post->id) }}">Đọc thêm</a></p>
											<!-- Link đến trang chi tiết -->
										</li>
									@endforeach
								</ul>
		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-gallery">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
				<h2 class="mb-4">Follow Us On Social Network</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
					live the blind texts. Separated they live in</p>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0">
		<div class="row no-gutters">
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/fb nghia.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/nghia.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-facebook"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/fbVinh.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/vinh.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-facebook"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/logoamzuni.PNG" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/logoamzuni.PNG);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-facebook"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/ytamzumi.PNG" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/thaybinh.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/intanghia.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/itanghia.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/fbVinh.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/vinh2.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-facebook"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

@endsection