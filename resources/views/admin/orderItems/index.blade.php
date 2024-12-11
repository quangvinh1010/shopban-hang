@extends('admin.layout')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('admin.orderItems.create') }}" class="btn btn-default">Create a New Order Item</a>
        </div>

        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <h5 class="card-header">Order Items Table</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $orderItem->id }}</td>
                                    <td class="text-primary">{{ $orderItem->order_id }}</td>
                                    <td>{{ $orderItem->product_id }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                    <td>
                                        <a href="{{ route('admin.orderItems.edit', $orderItem->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.orderItems.destroy', $orderItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
