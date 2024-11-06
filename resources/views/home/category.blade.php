@extends('layout')

@section('title', 'Category: ' . $category->name)

@section('content')
<section class="ftco-section bg-light">
    <div class="container">
        <h2 class="mb-4">{{ $category->name }}</h2>
        <div class="row">
            @foreach($category->products as $product)
                <div class="col-sm-12 col-md-6 col-lg-4 ftco-animate d-flex">
                    <div class="product d-flex flex-column">
                        <a href="#" class="img-prod">
                            <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3">
                            <div class="d-flex">
                                <div class="cat">
                                    <span>{{ $category->name }}</span>
                                </div>
                                <div class="rating">
                                    <p class="text-right mb-0">
                                        @for($i = 0; $i < 5; $i++)
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        @endfor
                                    </p>
                                </div>
                            </div>
                            <h3><a href="#">{{ $product->name }}</a></h3>
                            <div class="pricing">
                                <p class="price"><span>{{ number_format($product->price, 0, ',', '.') }} VNĐ</span></p>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart text-center py-2 mr-1">
                                    <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                                </a>
                                <a href="{{ route('product.show', $product->id) }}" class="buy-now text-center py-2">
                                    Buy now<span><i class="ion-ios-cart ml-1"></i></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
