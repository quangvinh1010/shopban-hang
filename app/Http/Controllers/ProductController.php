<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $priceRanges = [
            '50-100' => [50, 100],
            '100-200' => [100, 200],
            '200-300' => [200, 300],
            '300-400' => [300, 400],
        ];

        $priceCounts = [];
        foreach ($priceRanges as $range => $prices) {
            $priceCounts[$range] = Product::whereBetween('price', $prices)->count();
        }

        $query = Product::query();

        // Filter by price ranges
        if ($request->has('price')) {
            $selectedPriceRanges = $request->input('price');
            $query->where(function ($query) use ($selectedPriceRanges, $priceRanges) {
                foreach ($selectedPriceRanges as $range) {
                    if (isset($priceRanges[$range])) {
                        $query->orWhereBetween('price', $priceRanges[$range]);
                    }
                }
            });
        }



        // Search by product name
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        // Sort products
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'asc') {
                $query->orderBy('name', 'asc');
            } elseif ($sort == 'desc') {
                $query->orderBy('name', 'desc');
            } elseif ($sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            }
        }

        $productList = $query->paginate(12);

        $categoryId = $request->query('category');

        if ($categoryId) {
            $category = Category::findOrFail($categoryId);
            $productList = $category->products; // Sử dụng quan hệ để truy vấn sản phẩm
        } else {
            $productList = Product::all();
        }

        return view('Products.index', [
            'productList' => $productList,
            'categoryName' => $categoryId ? $category->name : 'All Products',
            'priceCounts' => $priceCounts,
            'categories' => $categories
        ]);
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

        $categories = Category::all();
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Lấy danh sách tất cả sản phẩm (tạo productList)
        $productList = Product::all(); // You can modify this to a more specific query if needed

        // Truyền biến đến view
        return view('products.show', compact('product', 'productList', 'categories'));
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

    public function getProductsByCategory($id)
    {
        $category = Category::findOrFail($id);
        $productList = $category->products;

        return view('products.index', [
            'categoryName' => $category->name,
            'productList' => $productList
        ]);
    }
}
