@extends('layout')

@section('title','List Product')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Search</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home.index')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container">

    <div class="row">
        @foreach($productSearch as $product)
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
</div>
@endsection