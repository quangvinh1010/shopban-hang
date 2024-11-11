<h3>Helo {{ $account->name }}</h3>
<p>
    Cảm ơn bạn đã đăng ký tài khoản với chúng tôi. Để hoàn tất quá trình đăng ký và có thể đăng nhập, vui lòng xác nhận tài khoản của bạn.
</p>
<p>
    <a href="{{ route('auth.verify_account', $account->email) }}">Bấm vào đây để xác nhận tài khoản</a>
</p>
<p>
    Sau khi xác nhận, bạn sẽ có thể sử dụng tài khoản của mình để đăng nhập và truy cập đầy đủ các tính năng.
</p>
<p>
    Trân trọng,
    <br>
    Đội ngũ hỗ trợ
</p>
