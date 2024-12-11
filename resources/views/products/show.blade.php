@extends('layout')

@section('title', 'SẢN PHẨM')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('images/backgout.png') }}')">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/quan-ao-doi-nam-nu-thu-dong.jpg" class="image-popup prod-img-bg"><img
                            src="{{ url($product->img) }}" class="img-fluid" alt="Colorlib Template"></a>
                    <hr>
                    <!-- Product Thumbnails -->
                    <div class="row">
                        @foreach ($product->images as $image)
                            <div class="col-2 mb-2">
                                <a href="{{ url($image->img) }}" class="image-popup prod-img-bg">
                                    <img src="{{ url($image->img) }}" class="img-fluid" alt="Thumbnail">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star"></span></a>
                            <a href="#"><span class="ion-ios-star"></span></a>
                            <a href="#"><span class="ion-ios-star"></span></a>
                            <a href="#"><span class="ion-ios-star"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span
                                    style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span
                                    style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <div class="pricing">
                        @if ($product->sale_price > 0)
                            <p class="price " style="color: red">
                                <span><s>{{ str_replace(',', '.', number_format($product->price)) }}đ</s></span>
                            </p>
                            <p class="sale-price">
                                <span>{{ str_replace(',', '.', number_format($product->sale_price)) }}đ</span>
                            </p>
                        @else
                            <p class="price"> <span>{{ str_replace(',', '.', number_format($product->price)) }}đ</span> </p>
                        @endif
                    </div>
                    <p>{{ $product->desc }}</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                        <option value="">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="d-flex align-items-center mb-8 pt-2" style="margin-left: 17px">
                            <input id="quantityInput" type="number" name="quantity" value="1" min="1"
                                max="999" onchange="updateQuantity()">
                            <div class="input-group-btn">
                                <script>
                                    function updateQuantity() {
                                        var quantity = document.getElementById('quantityInput').value;
                                        document.getElementById('hiddenQuantity').value = quantity; // Cập nhật giá trị của trường ẩn
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;"></p>
                        </div>
                    </div>
                    <div class=" ">
                        <form id="addToCartForm" method="POST"
                            action="{{ route('cart.add', ['product' => $product->id]) }}" class="d-inline">
                            @csrf
                            <input id="hiddenQuantity" type="hidden" name="quantity" value="1">
                            <button class="btn btn-primary btn-sm text-white p-2" type="submit" aria-label="Add to Cart">
                                <i class="fas fa-shopping-cart mr-1"> Add To Cart</i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h4>Bình Luận Của Khách Hàng</h4>
                    @if (auth('cus')->check())
                        <div class="comments-section">
                            @if ($comments->isNotEmpty())
                                @foreach ($comments as $comm)
                                    <div class="comment">
                                        <p>
                                            <strong>{{ $comm->customer->name ?? 'Khách hàng' }}</strong> 
                                            <span class="text-muted">{{ $comm->created_at->format('d/m/Y') }}</span>
                                        </p>
                                        <p>{{ $comm->comment }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p>Chưa có bình luận nào cho sản phẩm này.</p>
                            @endif
                            <!-- Form Để Lại Bình Luận -->
                            <form method="POST" action="{{ route('product.comment', ['proId' => $product->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Thêm Bình Luận</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>
                            </form>
                        </div>
                    @else
                        <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
                    @endif
                </div>
            </div>
            
    </section>
@endsection
