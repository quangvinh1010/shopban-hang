@extends('layout')

@section('title','Cart')

@section('content')
<div class="container-fluid bg-secondary mb-5" style="background-image: url('images/bgr1.jpg'); width: 100%">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-9 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                    $totalAmount = 0;
                    $discount = 0.1; // 10% discount
                    $shippingFee = 5.00;
                    $taxRate = 0.07; // 7% tax
                    @endphp
                    @foreach($cart as $key => $item)
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset(($item['product_id'] ?? $item['img'])) }}" alt="" style="width: 150px; border: 2px solid #ccc; border-radius: 5px;">
                        </td>
                        <td class="align-middle">{{ $item['name'] }}</td>
                        <td class="align-middle">${{ $item['price'] }}</td>
                        <td class="align-middle">${{ $item['price'] * $item['quantity'] }}</td>
                        <td class="align-middle">
                            <form action="{{ route('cart.update', ['id' => $key]) }}" method="POST" class="update-form">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center" name="quantity" value="{{ $item['quantity'] }}" style="width: 1px;">
                                </div>
                            </form>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm btn-primary update-btn"><i class="fa fa-check"></i></button>
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('cart.delete', ['id' => $key]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                    $totalAmount += $item['price'] * $item['quantity'];
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 ">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0 text-center">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-2">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{ number_format($totalAmount, 2) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h6 class="font-weight-medium">Discount (10%)</h6>
                        <h6 class="font-weight-medium">-${{ number_format($totalAmount * $discount, 2) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h6 class="font-weight-medium">Shipping Fee</h6>
                        <h6 class="font-weight-medium">${{ number_format($shippingFee, 2) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h6 class="font-weight-medium">Tax (7%)</h6>
                        <h6 class="font-weight-medium">${{ number_format($totalAmount * $taxRate, 2) }}</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent text-center">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        @php
                        $grandTotal = $totalAmount - ($totalAmount * $discount) + $shippingFee + ($totalAmount * $taxRate);
                        @endphp
                        <h5 class="font-weight-bold">${{ number_format($grandTotal, 2) }}</h5>
                    </div>
                    <a href="{{ route('home.checkout') }}">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.update-btn').click(function() {
            var form = $(this).closest('td').prev('td').find('.update-form');
            form.submit();
        });
    });
</script>
<!-- Cart End -->
@endsection
