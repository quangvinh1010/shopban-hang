@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-10">
                    <!-- Order Item Creation Form -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block" id="basicform">
                                <h3 class="section-title">Create Order Item</h3>
                            </div>
                            <div class="card">
                                <h5 class="card-header">Order Item Form</h5>
                                <div class="card-body">
                                    <form action="{{ route('admin.orderItems.store') }}" method="post">
                                        @csrf

                                        <!-- Product Selection -->
                                        <div class="form-group">
                                            <label for="product_id" class="col-form-label">Product</label>
                                            <select name="product_id" id="product_id" class="form-control">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->id }}: {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Order Selection -->
                                        <div class="form-group">
                                            <label for="order_id" class="col-form-label">Order</label>
                                            <select name="order_id" id="order_id" class="form-control">
                                                @foreach ($orders as $order)
                                                    <option value="{{ $order->id }}">
                                                        {{ $order->id }}: {{ $order->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-group">
                                            <label for="quantity" class="col-form-label">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Price</label>
                                            <input type="number" name="price" id="price" class="form-control" placeholder="Price" required>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group d-flex justify-content-end">
                                            <a href="{{ route('admin.orderItems.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                                            <button type="submit" class="btn btn-success">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
