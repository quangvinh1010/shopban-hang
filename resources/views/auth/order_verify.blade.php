<div style="border: 3px">
    @if (is_object($order) && isset($order->customer))
        <h3>Hi {{ $order->customer->name }}</h3>
    @endif
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam similique suscipit, ex temporibus vel molestiae aut
        veniam ipsum facere vitae expedita voluptatum obcaecati, quod pariatur distinctio modi sed minima praesentium.
    </p>

    <h4>Your order detail</h4>

    <table border="1" cellpadding="3" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        @if (is_object($order) && $order->details->isNotEmpty())
            @foreach ($order->details as $detail)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $detail->product->name ?? 'Product not available' }}</td>
                    <td>{{ number_format($detail->price, 2) }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No order details available</td>
            </tr>
        @endif
    </table>

    <p>
        <a href="{{ route('auth.order_verify', $token) }}"
            style="display: inline-block; padding: 7px 25px; color: #fff; background: darkblue">Click here verify
            order</a>
    </p>
</div>
