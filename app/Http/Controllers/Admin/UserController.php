<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userList = User::all();
        return view('admin.users.index', compact('user', 'userList'));
    }

    /**
     * Show the form for creating or editing a user.
     */
    public function create($id = null)
    {
        $user = $id ? User::findOrFail($id) : null;
        $cats = Category::all();  // If categories are relevant, you can include them.
        return view('admin.users.create', compact('user', 'cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->only([
            'name',
            'email',
            'password'
        ]));
        $message = 'Tạo người dùng thành công.';
        if ($user == null) {
            $message = ' Tạo người dùng thất bại.';
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request (password is optional during update)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed', // Optional during update
            'role' => 'nullable|string|max:50',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Update password only if filled
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        // Update role if provided
        if ($request->filled('role')) {
            $user->role = $validated['role'];
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('message', 'Người dùng đã cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $message = 'Xóa người dùng thành công';
        if (!User::destroy($id)) {
            $message = 'Xóa người dùng không thành công';
        }
        return redirect()->route("admin.users.index")->with('message');
    }
}
