<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Lấy tất cả các bài viết
        $categories = Category::all();
        return view('blog.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Create a new post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        // Handle image upload if there's one
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Bài viết được tạo thành công!');
    }
}
