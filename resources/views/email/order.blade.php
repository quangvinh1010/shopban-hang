<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
</head>
<body>
    <h1>Xác Nhận Đơn Hàng</h1>
    <p>Chào {{ $order->name }},</p>
    <p>Cảm ơn bạn đã đặt hàng! Dưới đây là chi tiết đơn hàng:</p>

    <h3>Chi Tiết Đơn Hàng</h3>
    <table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Tạm Tính</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $index => $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Cách đơn giản hơn để lấy chỉ số -->
                    <td>{{ $detail->product->name ?? 'Không xác định' }}</td>
                    <td>{{ number_format($detail->price, 2) }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><b>Tổng Cộng:</b> {{ number_format($order->details->sum(fn($d) => $d->price * $d->quantity), 2) }}</p>

    <p>
        Vui lòng xác nhận đơn hàng của bạn bằng cách nhấn vào liên kết bên dưới:
        <a href="{{ route('order.verify', ['token' => $order->token]) }}" style="color: blue;">Xác Nhận Đơn Hàng</a>
    </p>
    
</body>
</html>
