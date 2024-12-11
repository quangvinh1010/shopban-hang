@extends('admin.layout')

@section('content')
    <h3>Edit Order Item</h3>

    <form action="{{ route('admin.orderItems.update', $orderItem->id) }}" method="POST" class="form-horizontal" role="form">
        @csrf
        @method('PUT')

        <!-- Quantity -->
        <div class="form-group row">
            <label for="quantity" class="col-md-2 col-form-label">Id</label>
            <div class="col-md-10">
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $orderItem->id }}" required>
            </div>
        </div>

        <!-- Product Selection -->
        <div class="form-group row">
            <label for="product_id" class="col-md-2 col-form-label">Product ID</label>
            <div class="col-md-10">
                <select name="product_id" id="product_id" class="form-control" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $orderItem->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->id }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Order Selection -->
        <div class="form-group row">
            <label for="order_id" class="col-md-2 col-form-label">Order ID</label>
            <div class="col-md-10">
                <select name="order_id" id="order_id" class="form-control" required>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $orderItem->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->id }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Quantity -->
        <div class="form-group row">
            <label for="quantity" class="col-md-2 col-form-label">Quantity</label>
            <div class="col-md-10">
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $orderItem->quantity }}" required>
            </div>
        </div>

        <!-- Price -->
        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-10">
                <input type="number" name="price" id="price" class="form-control" value="{{ $orderItem->price }}" required>
            </div>
        </div>

        <!-- Buttons -->
        <div class="form-group row">
            <div class="col-md-10 offset-md-2">
                <a href="{{ route('admin.orderItems.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
@endsection
