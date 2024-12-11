<div style="border: 2px solid green; padding: 15px; max-width: 600px; font-family: Arial, sans-serif;">
    <h3>Hello, {{ $customer->name }}</h3>
    <p>
        You requested a password reset. If you did not make this request, you can ignore this email.
    </p>
    <p>
        To reset your password, click the link below:
    </p>
    <p>
        <a href="{{  route('auth.reset_password', $token) }}" 
           style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #28a745; text-decoration: none; border-radius: 5px;">
            Reset Password
        </a>
    </p>
    <p>
        This link will expire in 24 hours. If you encounter any issues, please contact support.
    </p>
</div>
