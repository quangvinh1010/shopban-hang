@extends('layout')

@section('title', 'Products in ' . $categoryName)

@section('content')
<h2>Products in Category: {{ $categoryName }}</h2>

<div class="row">
    @foreach($productList as $product)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ url($product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
