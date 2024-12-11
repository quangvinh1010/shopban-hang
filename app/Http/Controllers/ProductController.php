<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Comment;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Danh sách danh mục
        $categories = Category::all();

        // Định nghĩa khoảng giá
        $priceRanges = [
            '50000-100000' => [50000, 100000],
            '100000-200000' => [100000, 200000],
            '200000-300000' => [200000, 300000],
            '300000-400000' => [300000, 400000],
        ];

        // Tính số lượng sản phẩm cho từng khoảng giá
        $priceCounts = collect($priceRanges)->mapWithKeys(function ($prices, $range) {
            $count = Product::whereBetween('price', [$prices[0], $prices[1]])->count();
            return [$range => $count];
        })->toArray();

        // Khởi tạo query
        $query = Product::query();

        // Lọc theo danh mục
        $categoryId = $request->query('category');
        if ($categoryId) {
            $category = Category::findOrFail($categoryId);
            $query->where('category_id', $category->id);
        }

        // Lọc theo khoảng giá
        if ($request->filled('price')) {
            $selectedPriceRanges = $request->input('price');
            $query->where(function ($query) use ($selectedPriceRanges, $priceRanges) {
                foreach ($selectedPriceRanges as $range) {
                    if (isset($priceRanges[$range])) {
                        $query->orWhereBetween('price', $priceRanges[$range]);
                    }
                }
            });
        }

        // Tìm kiếm theo tên sản phẩm
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        // Sắp xếp sản phẩm
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

        // Lấy danh sách sản phẩm (có phân trang)
        $productList = $query->paginate(6); // Apply pagination here (12 items per page)

        // Render view
        return view('products.index', [
            'productList' => $productList,
            'categoryName' => $categoryId ? $category->name : 'All Products',
            'priceCounts' => $priceCounts,
            'categories' => $categories,
        ]);
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

        $product = Product::with('comments.customer')->findOrFail($id); // Tối ưu với eager loading
        $comments = $product->comments;

        $category = $product->category;

        return view('products.show', compact('product', 'comments', 'categories', 'category'));
    }



    public function addComment($proId)
    {
        $data = request()->validate([
            'comment' => 'required|string|max:500',
        ]);

        $data['product_id'] = $proId;
        $data['customer_id'] = auth('cus')->id();

        if (Comment::create($data)) {
            return redirect()->route('product.show', $proId)->with('success', 'Comment added successfully!');
        }

        return redirect()->back()->with('error', 'There was an error adding your comment.');
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
