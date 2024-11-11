<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccount;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Mail;

class RegisteredUserController extends Controller
{
    public function register(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    public function check_register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:users', // adjust 'users' if your table name is different
            'phone' => 'required|numeric|min:10', // Add phone validation
            'address' => 'required|max:255',
            'gender' => 'required|in:0,1',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 6 characters long',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
            'phone.min' => 'Phone number must be at least 10 digits long',
            'confirm_password.same' => 'Passwords do not match',
        ]);

        $data = $req->only(['name', 'email', 'phone', 'address', 'gender']);
        $data['password'] = Hash::make($req->password);

        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('login')->with('ok', 'Register successfully, please check your email to verify account');
        }

        return redirect()->back()->with('no', 'Something went wrong, please try again');
    }

    public function verify_account($email)
    {
        $acc = Customer::where('email', $email)->whereNULL('email_verified_at')->firstOrFail();
        $acc->update(['email_verified_at' => now()]);
        return redirect()->route('login')->with('ok', 'Account verified successfully, you can now log in');
    }
}
