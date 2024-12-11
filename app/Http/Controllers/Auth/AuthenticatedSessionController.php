<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerResetToken;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login view.
     */
    public function login(): View
    {
        $categories = Category::all();
        return view('auth.login', compact('categories'));
    }

    /**
     * Handle login submission.
     */
    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:customers,email',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');

        // Attempt login with 'cus' guard
        if (auth('cus')->attempt($credentials)) {
            if (auth('cus')->user()->email_verified_at === null) {
                auth('cus')->logout();
                return redirect()->back()->with('no', 'Tài khoản của bạn chưa được xác minh. Vui lòng kiểm tra email của bạn.');
            }
            return redirect()->route('home.index')->with('ok', 'Chào mừng trở lại!');
        }

        return redirect()->back()->with('no', 'Email hoặc mật khẩu không hợp lệ.');
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        auth('cus')->logout(); // Make sure to log out from 'cus' guard
        return redirect()->route('home.index')->with('ok', 'Đăng xuất ');
    }

    /**
     * Show the change password form.
     */
    public function change_password(): View
    {
        $categories = Category::all();
        return view('auth.change_password', compact('categories'));
    }

    public function check_change_password(Request $req)
    {
        // Get the currently authenticated user
        $auth = auth('cus')->user();

        // Check if the user is authenticated
        if (!$auth) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập lại.');
        }

        $req->validate([
            'old_password' => ['required', function ($attr, $value, $fail) use ($auth) {
                // Check if old password is correct
                if (!Hash::check($value, $auth->password)) {
                    $fail('Mật khẩu cũ của bạn không khớp.');
                }
            }],
            'password' => 'required|min:8|confirmed', // This will now validate against password_confirmation
            'password_confirmation' => 'required', // Confirm that the password confirmation field is filled
        ]);


        $data['password'] = bcrypt($req->password);
        // Update the user's password
        if ($auth->update($data)) {
            return redirect()->route('login')->with('ok', 'Đã cập nhật mật khẩu thành công. Vui lòng đăng nhập lại.');
        }

        return redirect()->back()->with('error', 'Không thể thay đổi mật khẩu.');
    }


    /**
     * Show the forgot password form.
     */
    public function forgot_password(): View
    {
        $categories = Category::all();
        return view('auth.forgot_password', compact('categories'));
    }

    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers,email',
        ]);

        $customer = Customer::where('email', $req->email)->first();

        $token = \Str::random(50);

        // Kiểm tra và xóa token cũ nếu tồn tại
        CustomerResetToken::where('email', $req->email)->delete();

        $tokenData = [
            'email' => $req->email,
            'token' => $token,
        ];

        // Tạo token mới
        if (CustomerResetToken::create($tokenData)) {
            Mail::to($req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->back()->with('ok', 'Vui lòng kiểm tra email.');
        }

        return redirect()->back()->with('error', 'Đã xảy ra lỗi, vui lòng thử lại.');
    }



    /**
     * Show the profile page.
     */
    public function profile(): View
    {
        $categories = Category::all();
        $auth = auth('cus')->user();
        return view('auth.profile', compact('categories', 'auth'));
    }

    public function check_profile(Request $req)
    {
        $auth = auth('cus')->user();

        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:users,email,' . $auth->id,
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
            'gender' => 'required|in:0,1',
            'password' => ['required', function ($attr, $value, $fail) use ($auth) {
                if (!Hash::check($value, $auth->password)) {
                    $fail('Mật khẩu không khớp với hồ sơ của chúng tôi.');
                }
            }],
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 6 characters long.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number must be numeric.',
            'phone.digits' => 'Phone number must be exactly 10 digits long.',
            'address.required' => 'Address is required.',
            'gender.required' => 'Gender is required.',
        ]);

        $data = $req->only('name', 'email', 'phone', 'address', 'gender');

        if ($auth->update($data)) {
            return redirect()->back()->with('ok', 'Hồ sơ được cập nhật thành công.');
        }
        return redirect()->back()->with('no', 'Đã xảy ra lỗi, vui lòng thử lại.');
    }



    /**
     * Show the reset password form.
     */
    public function reset_password($token)
    {
        $categories = Category::all();
        $tokenData = CustomerResetToken::checkToken($token);

        return view('auth.reset_password', compact('categories', 'tokenData'));
    }

    public function check_reset_password(Request $req, $token)
    {
        request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        $tokenData = CustomerResetToken::checkToken($token);
        $customer = $tokenData->customer;

        $data = [
            'password' => bcrypt(request('password'))
        ];
        $check  = $customer->update($data);
        if ($check) {
            return redirect()->route('login')->with('ok', 'Cập nhật mật khẩu thành công.');
        }
        return redirect()->back()->with('no', 'Đã xảy ra lỗi, vui lòng thử lại.');
    }
}
