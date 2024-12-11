@extends('layout')

@section('title', 'CỬA HÀNG')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/backgout.png');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span></p>
                    
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Product Filters Start -->
                <div class="col-md-3 col-lg-3">
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                        <form id="filterForm" method="GET" action="{{ route('products.index') }}">
                            @foreach ($priceCounts as $range => $count)
                                @if ($count > 0)
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" name="price[]"
                                            value="{{ $range }}" id="price-{{ $loop->index }}"
                                            {{ in_array($range, request('price', [])) ? 'checked' : '' }}
                                            onchange="document.getElementById('filterForm').submit();">
                                        <label class="custom-control-label" for="price-{{ $loop->index }}">
                                            {{ $range }} ({{ $count }})
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                </div>
                <!-- Product Filters End -->

                <!-- Product List Start -->
                <div class="col-md-8 col-lg-9 order-md-last">
                    <div class="row">
                        @foreach ($productList as $product)
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product d-flex flex-column">
                                    <a href="{{ route('products.show', $product->id) }}" class="img-prod"><img
                                            class="img-fluid" src="{{ url($product->img) }}" alt="Colorlib Template">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3">
                                        <div class="d-flex">
                                            <div class="cat">
                                                <span>Lifestyle</span>
                                            </div>
                                            <div class="rating">
                                                <p class="text-right mb-0"  style="margin-top: 0px">
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <h3><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="pricing">
                                            @if ($product->sale_price > 0)
                                                <p class="price" style="color: red">
                                                    <span><s>{{ str_replace(',', '.', number_format($product->price)) }}đ</s></span>
                                                </p>
                                                <p class="price_sale">
                                                    <span>{{ str_replace(',', '.', number_format($product->sale_price)) }}đ</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span>{{ str_replace(',', '.', number_format($product->price)) }}đ</span>
                                                </p>
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
                    
                        
                        <!-- Custom pagination -->
                        <div class="pagination-container">
                            @if ($productList->hasPages())
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($productList->onFirstPage())
                                        <li class="disabled"><span>&laquo; Previous</span></li>
                                    @else
                                        <li><a href="{{ $productList->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                    @endif
                        
                                    {{-- Pagination Elements --}}
                                    @foreach ($productList->getUrlRange(1, $productList->lastPage()) as $page => $url)
                                        <li class="{{ $page == $productList->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                        
                                    {{-- Next Page Link --}}
                                    @if ($productList->hasMorePages())
                                        <li><a href="{{ $productList->nextPageUrl() }}" rel="next"> &raquo;</a></li>
                                    @else
                                        <li class="disabled"><span>Next &raquo;</span></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                </div>
                <!-- Product List End -->
            </div>
        </div>
    </section>
@endsection
