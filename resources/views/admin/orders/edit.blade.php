@extends('admin.layout')

@section('content')
    <h3>Edit Order</h3>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="form-horizontal" role="form">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $order->name) }}" placeholder="Enter name">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $order->email) }}" placeholder="Enter email">
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $order->phone) }}" placeholder="Enter phone">
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label">Address</label>
            <div class="col-md-10">
                <textarea class="form-control" id="address" name="address" placeholder="Enter address">{{ old('address', $order->address) }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-10 offset-md-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>

@endsection
