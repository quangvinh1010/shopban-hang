@extends('layout')

@section('title', 'List Product')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span></p>
					<h1 class="mb-0 bread">Shop</h1>
				</div>
			</div>
		</div>
	</div>
    
<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-10 order-md-last">
					<div class="row">
						@foreach($productList as $product)
						<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
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
										<a href="{{ route('products.show', $product->id) }}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
													class="ion-ios-add ml-1"></i></span></a>
										<a href="product-single.html" class="buy-now text-center py-2">Buy now<span><i
													class="ion-ios-cart ml-1"></i></span></a>
									</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<ul>
									<li><a href="shop3.html">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="shop2.html">2</a></li>
									<li><a href="shop3.html">3</a></li>
									<li><a href="shop2.html">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Price Start -->
			<div class="border-bottom mb-4 pb-4" style="margin-right: 50px;">
                <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                <form id="filterForm" method="GET" action="{{ route('products.index') }}">
                    @foreach($priceCounts as $range => $count)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price[]" value="{{ $range }}" id="price-{{ $loop->index }}" onchange="document.getElementById('filterForm').submit();">
                        <label class="custom-control-label" for="price-{{ $loop->index }}">{{ $range }}</label>
                        <span class="badge border font-weight-normal">{{ $count }}</span>
                    </div>
                    @endforeach
                </form>
            </div>
            <!-- Price End -->
			
			</div>
			
		</div>
		</div>
		</div>
		</div>
	</section>

@endsection