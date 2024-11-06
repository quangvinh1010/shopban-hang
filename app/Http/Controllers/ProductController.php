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
            '0-50' => [0, 50],
            '100-200' => [50, 100],
            '200-300' => [100, 200],
            '300-400' => [200, 300],
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
        // Filter by category
        if ($request->has('category')) {
            $selectedCategories = $request->input('category');
            $query->whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('id', $selectedCategories);
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

        $productList = $query->paginate(6);

        return view('Products.index', ['productList' => $productList, 'priceCounts' => $priceCounts, 'categories' => $categories]);
        
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

        $products = Product::all()->keyBy('id'); 
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
}
