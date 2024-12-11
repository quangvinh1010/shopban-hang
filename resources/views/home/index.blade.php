@extends('layout')

@section('title', 'HOME')

@section('content')

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" src="images/dodoi.jpg" style="height: 100%" alt="Áo cặp gia đình">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax="properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">#New Arrival</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3">Áo đôi Hot Trend</h1>
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
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" src="images/quan-ao-doi-dep-soc-trang.jpg" alt="Quần áo đôi đẹp sọc trắng">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax="properties: { translateY: '70%' }">
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


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Mã Voucher Của Bạn</h2>
                    <p>Chọn một mã voucher bên dưới và sử dụng để nhận ưu đãi.</p>
                </div>
            </div>
        
            <div class="row justify-content-center">
                @foreach ($vouchers as $voucher)
                    <div class="col-md-4 "> <!-- Adjust column size to 4 for 3 items per row -->
                        <!-- Voucher card display -->
                        <div class="voucher-card p-3 border rounded shadow-sm">
                            <h5 class="voucher-title">Mã Voucher: <strong>{{ $voucher->code }}</strong></h5>
                            <p>Giảm giá: 
                                @if($voucher->discount_amount)
                                    {{ number_format($voucher->discount_amount, 0, ',', '.') }} VND
                                @elseif($voucher->discount_percent)
                                    {{ $voucher->discount_percent }}%
                                @else
                                    Không có giảm giá
                                @endif
                            </p>
                            <p>Số lần nhập còn lại: {{ $voucher->usage_limit }}</p>
                            
                            <!-- Button to copy voucher code -->
                            <button class="btn btn-success" onclick="copyVoucherCode('{{ $voucher->code }}')">Lấy voucher</button>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <script>
                // Function to copy voucher code to clipboard
                function copyVoucherCode(code) {
                    navigator.clipboard.writeText(code).then(() => {
                        alert('Mã voucher đã được sao chép: ' + code);
                    }).catch(err => {
                        console.error('Lỗi khi sao chép mã voucher: ', err);
                    });
                }
            </script>
            
        </div>
        
        <script>
            // Function to copy voucher code to clipboard
            function copyVoucherCode(voucherCode) {
                // Create a temporary input element
                var tempInput = document.createElement('input');
                tempInput.value = voucherCode;
                document.body.appendChild(tempInput);
                
                // Select and copy the value
                tempInput.select();
                document.execCommand('copy');
                
                // Remove the temporary input element
                document.body.removeChild(tempInput);
        
                // Optional: Notify the user that the code has been copied
                alert('Mã voucher đã được sao chép: ' + voucherCode);
            }
        </script>
    </section>
    

    {{-- featrure product --}}
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Sản Phẩm Nổi Bật</h2>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($featrure_product as $fp)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="{{ route('products.show', $fp->id) }}" class="img-prod">
                                <img class="img-fluid" src="{{ url($fp->img) }}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>Lifestyle</span>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right mb-0" style="margin-top: 0px">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <h3><a href="{{ route('products.show', $fp->id) }}">{{ $fp->name }}</a></h3>
                                <div class="pricing">
                                    @if ($fp->sale_price > 0)
                                        <p class="price " style="color: red">   <span><s>{{ str_replace(',', '.', number_format($fp->price)) }}đ</s></span>    </p>
                                        <p class="sale-price">  <span>{{ str_replace(',', '.', number_format($fp->sale_price)) }}đ</span> </p>
                                    @else
                                        <p class="price"> <span style="font-weight: bold;">{{ str_replace(',', '.', number_format($fp->price)) }}đ</span> </p>
                                    @endif
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="" class="btn btn-sm text-dark p-0" style="margin-top: 7px;">
                                        <i class="far fa-heart text-primary mr-1"></i>


                                    </a>
                                    <form id="addToCartForm" method="POST" action="{{ route('cart.add', ['product' => $fp->id]) }}" class="d-inline">
                                        @csrf
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
        </div>
    </section>
    

    {{-- new product --}}
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Sản Phẩm Mới</h2>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach ($new_product as $product)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <!-- Product Image -->
                            <a href="{{ route('products.show', $product->id) }}" class="img-prod">
                                <img class="img-fluid" src="{{ url($product->img) }}" alt="{{ $product->name }}">
                                <div class="overlay"></div>
                            </a>
            
                            <!-- Product Details -->
                            <div class="text py-3 pb-4 px-3">
                                <!-- Category and Rating -->
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>Lifestyle</span>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right mb-0" style="margin-top: 0px">
                                            @for ($i = 0; $i < 5; $i++)
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            @endfor
                                        </p>
                                    </div>
                                </div>
            
                                <!-- Product Name -->
                                <h3>
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </h3>
            
                                <!-- Pricing -->
                                <div class="pricing">
                                    @if ($product->sale_price > 0)
                                        <p class="price " style="color: red">   <span><s>{{str_replace(',', '.', number_format($product->price)) }}đ</s></span>    </p>
                                        <p class="sale-price">  <span >{{ str_replace(',', '.', number_format($product->sale_price)) }}đ</span> </p>
                                    @else
                                        <p class="price"> <span style="font-weight: bold;">{{str_replace(',', '.', number_format($product->price)) }}đ</span> </p>
                                    @endif
                                </div>
            
                                <!-- Actions -->
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <!-- View Details -->
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm text-dark p-0" style="margin-top: 7px;">
                                        <i class="far fa-heart text-primary mr-1"></i>
                                    </a>
            
                                    <!-- Add to Cart -->
                                    <form method="POST" action="{{ route('cart.add', ['product' => $product->id]) }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
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

    {{-- sale product --}}
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Sản Phẩm Sale</h2>
                    
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                @foreach ($sale_product as $sp)
                    <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">

                        <div class="product d-flex flex-column">
                            <a href="{{ route('products.show', $sp->id) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ url($sp->img) }}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <span>Lifestyle</span>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right mb-0" style="margin-top: 0px">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <h3><a href="{{ route('products.show', $sp->id) }}">{{ $sp->name }}</a></h3>
                                <div class="pricing">
                                    @if ($sp->sale_price > 0)
                                        <p class="price " style="color: red">   <span><s>{{str_replace(',', '.', number_format($sp->price)) }}đ</s></span>    </p>
                                        <p class="sale-price">  <span>{{str_replace(',', '.', number_format($sp->sale_price)) }}đ</span> </p>
                                    @else
                                        <p class="price"> <span style="font-weight: bold;">{{str_replace(',', '.', number_format($sp->price)) }}đ</span> </p>
                                    @endif
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm text-dark p-0"
                                        style="margin-top: 7px;">
                                        <i class="far fa-heart text-primary mr-1"></i>
                                    </a>
                                    <form id="addToCartForm" method="POST" action="{{ route('cart.add', ['product' => $product->id]) }}" class="d-inline">
                                        @csrf
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
                    </div>
                    <div class="carousel-testimony owl-carousel ftco-animate">
                        @foreach ($posts as $post)
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="user-img mb-4"
                                        style="background-image: url({{ asset('storage/' . $post->image) }})">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4 pl-4 line">{{ $post->content }}</p>
                                        <p class="name">{{ $post->title }}</p>
                                        <span class="position">{{ $post->author }}</span>
                                        <!-- Assuming you have an author column -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="ftco-gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                    <h2 class="mb-4">Bộ sưu tập nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row justify-content-center gallery-row">
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url(images/bg-nam.png);">
                        
                    </a>
                    <h3 style="text-align: center; margin-top: 20px">Áo Nam</h3>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url(images/bg-nu.png);">
                        
                    </a>
                    <h3 style="text-align: center; margin-top: 20px">Áo Nữ</h3>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="" class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url(images/dodoi.jpg);">
                        
                    </a>
                    <h3 style="text-align: center; margin-top: 20px">Áo Đôi</h3>
                </div>
            </div>
        </div>
    </section>
    

@endsection