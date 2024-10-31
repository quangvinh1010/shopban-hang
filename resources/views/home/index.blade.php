@extends('layout')

@section('title', 'HOME')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span></p>
					<h1 class="mb-0 bread"></h1>
				</div>
			</div>
		</div>
	</div>
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
							<p class="bottom-area d-flex px-3">
								<a href="cart.html" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
											class="ion-ios-add ml-1"></i></span></a>
								<a href="product-single.html" class="buy-now text-center py-2">Buy now<span><i
											class="ion-ios-cart ml-1"></i></span></a>
							</p>
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
								<div class="text">
									<p class="mb-4 pl-4 line">Sản phẩm chất lượng vượt xa mong đợi.</p>
									<p class="name">Trâm Anh</p>
									<span class="position">Marketing Manager</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/avt3.jfif)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">So với các sản phẩm hàng hiệu một 9 một 10..</p>
									<p class="name">Ngọc Châu </p>
									<span class="position">Interface Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/avt2.jfif)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Hỗ trợ khách nhiệt tình, nhanh chóng, sản phẩm tốt.</p>
									<p class="name">Quế Chi</p>
									<span class="position">UI Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/avt1.jfif)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Sản phẩm này đáp ứng được mong đợi của tôi về chất lượng
										và tính năng.</p>
									<p class="name">Gia Hân</p>
									<span class="position">Web Developer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/avt4.jfif)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Sản phẩm dễ sử dụng và thích hợp cho cả người mới bắt đầu
										và người có kinh nghiệm.</p>
									<p class="name">Trung Dũng</p>
									<span class="position">System Analyst</span>
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