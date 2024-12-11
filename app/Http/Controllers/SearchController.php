<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( request $request)
    {
        $categories = Category::all();
        $query = $request->input('search');
        $productSearch = ModelsProduct::where('name', 'LIKE', "%$query%")->get();
        $featrure_product = Product::inRandomOrder()->limit(100)->get();
        return view('home.search', compact('productSearch', 'categories'));
    }

   
}