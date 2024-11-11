<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                return redirect()->back()->with('no', 'Your account is not verified. Please check your email.');
            }
            return redirect()->route('home.index')->with('ok', 'Welcome back!');
        }

        return redirect()->back()->with('no', 'Invalid email or password.');
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        auth('cus')->logout(); // Make sure to log out from 'cus' guard
        return redirect()->route('home.index')->with('ok', 'Your logout');
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
        $auth = auth('cus')->user();
        $req->validate([
            'old_password' => ['required', function ($attr, $value, $fail) use ($auth) {
                if (!Hash::check($value, $auth->password)) {
                    $fail('Your old password does not match.');
                }
            }],
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        // Logic to update the password if validation passes
        $auth->password = Hash::make($req->password);
        $auth->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }


    /**
     * Show the forgot password form.
     */
    public function forgot_password(): View
    {
        return view('auth.forgot_password');
    }

    public function check_forgot_password(Request $req)
    {
        // Define forgot password logic here.
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
                    $fail('The password does not match our records.');
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
            return redirect()->back()->with('ok', 'Profile updated successfully.');
        }
        return redirect()->back()->with('no', 'Something went wrong, please try again.');
    }



    /**
     * Show the reset password form.
     */
    public function reset_password(): View
    {
        return view('auth.reset_password');
    }

    public function check_reset_password(Request $req)
    {
        // Define reset password logic here.
    }
}
