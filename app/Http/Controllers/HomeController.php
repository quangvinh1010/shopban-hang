<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $categoryList = Category::all();
        $vouchers = Voucher::latest()->take(3)->get();
         
        $posts = Post::all();
        $new_product = Product::orderBy('created_at', 'DESC')->limit(4)->get();
        $sale_product = Product::orderBy('created_at', 'DESC')->where('sale_price', '>', 0)->limit(4)->get();
        $featrure_product = Product::inRandomOrder()->limit(4)->get();
        return view('home.index', compact('categories', 'categoryList', 'posts', 'new_product', 'sale_product', 'featrure_product', 'vouchers')); // Pass both categories and products to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lấy tất cả danh mục
        $categories = Category::all();

        // Lấy sản phẩm theo ID (thay đổi tên model theo tên model của bạn)
        $product = Product::findOrFail($id); // Hoặc cách khác tùy theo logic của bạn

        // Truyền biến đến view
        return view('products.show', compact('categories', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contact()
    {
        $categories = Category::all(); // Lấy tất cả các categories từ database
        return view('home.contact', compact('categories'));

    }

    public function about()
    {
        $categories = Category::all(); // Lấy tất cả các categories từ database
        return view('home.about', compact('categories'));

    }
}
