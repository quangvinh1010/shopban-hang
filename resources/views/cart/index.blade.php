@extends('layout')

@section('title', 'GIỎ HÀNG')

@section('content')
    <div class="container-fluid bg-secondary mb-5" style="background-image: url('images/bgr1.jpg'); width: 100%">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"></h1>

        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th></th>
                            <th>Products</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Quantity</th>

                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $totalAmount = 0;
                            $discount = 0.1;
                            $shippingFee = 5.0;
                            $taxRate = 0.07;
                        @endphp
                        @foreach ($carts as $item)
                            <tr>
                                <td class="align-middle">
                                    <form action="{{ route('cart.delete', $item->prod->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            onclick="return confirm('bạn có chắc chắn muốn xóa sản phẩm không?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <img src="{{ asset($item->prod->img) }}" alt=""
                                        style="width: 100px; border: 2px solid #ccc; border-radius: 5px;">
                                </td>
                                <td class="align-middle">
                                    {{ $item->prod->name }}
                                </td>

                                <td class="align-middle">
                                    ${{ str_replace(',', '.', number_format($item->sale_price ?: $item->price)) }}đ
                                </td>
                                <td class="align-middle">
                                    ${{ str_replace(',', '.', number_format($item->price * $item->quantity)) }}đ
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.update', $item->product_id) }}" method="POST"
                                        id="update-form-{{ $item->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control form-control-sm bg-secondary text-center"
                                                name="quantity" value="{{ $item->quantity }}" style="width: 50px;">
                                        </div>
                                    </form>
                                </td>

                            </tr>
                            @php
                                $totalAmount += $item->price * $item->quantity;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                </br>
                <div class="text-center">
                    <a href="{{ route('products.index') }}" class="btn btn-primary" style="margin-right: 20px">Tiếp tục mua
                        sắm</a>
                    @if ($carts->count())
                        <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm?')">
                                <i class="fa fa-trash"></i> Xoá giỏ hàng
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 ml-auto">
                <div class="card border-secondary mb-5">
                    <!-- Card Header -->
                    <div class="card-header bg-secondary text-white text-center">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>

                    <!-- Inside your cart summary -->
                    <div class="card-body">
                        <h5 class="font-weight-bold">Áp dụng Voucher</h5>
                        <form action="{{ route('apply.voucher') }}" method="POST">
                            @csrf
                            <input type="text" name="voucher_code" placeholder="Nhập mã voucher" required style="width: 269px">
                            <button type="submit" >Áp dụng </button>
                        </form>

                        <!-- Cart Summary Details -->
                        <div class="summary-details">
                            <div class="d-flex justify-content-between mt-3">
                                <span class="font-weight-medium">Tổng phụ</span>
                                <span class="font-weight-medium">{{ number_format($totalAmount) }}đ</span>
                            </div>

                            <div class="d-flex justify-content-between mt-2">
                                <span class="font-weight-medium">Phiếu giảm giá</span>
                                <span class="font-weight-medium">
                                    @php
                                        $voucherDiscount = session('voucher_discount', 0);
                                    @endphp
                                    @if ($voucherDiscount > 0)
                                        -{{ number_format($voucherDiscount) }}đ
                                    @else
                                        0đ
                                    @endif
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mt-2">
                                <span class="font-weight-medium">Phí vận chuyển</span>
                                <span class="font-weight-medium">{{ number_format($totalAmount * 0.07) }}đ</span>
                            </div>

                            <div class="d-flex justify-content-between mt-2">
                                <span class="font-weight-bold">Tổng số cuối cùng</span>
                                <span class="font-weight-bold">
                                    {{ number_format($totalAmount - session('voucher_discount', 0) + $totalAmount * 0.07) }}đ
                                </span>
                            </div>
                        </div>

                        <div class="card-footer border-secondary bg-transparent text-center" style="margin-top: 20px">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng cộng</h5>
        
                                @php
                                    // Retrieve values from session or set defaults
                                    $totalAmount = session('totalAmount', 0); // The original total amount
                                    $discount = session('voucher_discount', 0); // Discount from the applied voucher
                                    $shippingFee = $totalAmount * 0.07; // Shipping fee as 7% of totalAmount
        
                                    // Calculate the final amount after applying discount and adding shipping fee
                                    $finalAmount = $totalAmount - $discount + $shippingFee;
                                @endphp
        
                                <h5 class="font-weight-bold">
                                    {{ number_format($finalAmount, 0, ',', '.') }} đ
                                </h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary ">
                        <div class="card-footer border-secondary bg-transparent">
                            <a href="{{ route('order.checkout') }}">
                                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Automatically submit the form when quantity is changed
            $('input[name="quantity"]').on('change', function() {
                var formId = $(this).closest('form').attr('id');
                $('#' + formId).submit();
            });
        });
    </script>
@endsection
