<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index', 'show']);
    }

    public function index()
    {
        $data = Product::orderBy('id', 'DESC')->paginate(200);
        return view('admin.products.index', compact('data'));
    }

    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.products.create', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lte:price',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'other_img.*' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only('name', 'price', 'sale_price', 'status', 'desc', 'category_id');

        // Handle main image
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->img->hashname();
            $request->img->move(public_path('uploads/product'), $imageName);
            $data['img'] = 'uploads/product/' . $imageName;
        }

        $product = Product::create($data);

        if ($product && $request->hasFile('other_img')) {
            foreach ($request->file('other_img') as $file) {
                $otherImageName = time() . '_' . $file->hashname();
                $file->move(public_path('uploads/product'), $otherImageName);
                ProductImage::create([
                    'img' => 'uploads/product/' . $otherImageName,
                    'product_id' => $product->id,
                ]);
            }
        }

        return $product
            ? redirect()->route('admin.products.index')->with('ok', 'Đã thêm sản phẩm thành công')
            : redirect()->back()->with('no', 'Không thể thêm sản phẩm');
    }

    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.products.edit', compact('cats', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products,name,' . $product->id,
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lte:price',
            'img' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048|mimetypes:image/jpeg,image/png,image/gif',
            'other_img.*' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'desc' => 'required|min:10',
        ]);

        $data = $request->only('name', 'price', 'sale_price', 'status', 'desc', 'category_id');

        // Handle main image
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->img->hashName();
            $request->img->move(public_path('uploads/product'), $imageName);

            // Delete old image if exists
            if ($product->img && file_exists(public_path($product->img))) {
                unlink(public_path($product->img));
            }

            $data['img'] = 'uploads/product/' . $imageName;
        }

        // Handle other images
        if ($request->hasFile('other_img')) {
            // Delete old other images before uploading new ones
            ProductImage::where('product_id', $product->id)->delete();

            foreach ($request->file('other_img') as $file) {
                $otherImageName = time() . '_' . $file->hashname();
                $file->move(public_path('uploads/product'), $otherImageName);
                ProductImage::create([
                    'img' => 'uploads/product/' . $otherImageName,
                    'product_id' => $product->id,
                ]);
            }
        }

        return $product->update($data)
            ? redirect()->route('admin.products.index')->with('ok', 'Sản phẩm được cập nhật thành công')
            : redirect()->back()->with('no', 'Không thể cập nhật sản phẩm');
    }

    public function destroy(Product $product)
    {
        // Delete associated images
        if ($product->img && file_exists(public_path($product->img))) {
            unlink(public_path($product->img));
        }

        foreach ($product->images as $img) {
            if (file_exists(public_path($img->img))) {
                unlink(public_path($img->img));
            }
        }

        ProductImage::where('product_id', $product->id)->delete();

        return $product->delete()
            ? redirect()->route('admin.products.index')->with('ok', 'Đã xóa sản phẩm thành công')
            : redirect()->back()->with('no', 'Không thể xóa sản phẩm');
    }

    public function destroyImage(ProductImage $image)
    {
        $img_name = $image->img;  // Fix the attribute name
        if ($image->delete()) {
            $image_path = 'uploads/product/' . $img_name;
            if (Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
            return redirect()->back()->with('ok', 'Xóa ảnh thành công');
        }
        return redirect()->back()->with('no', 'Xóa ảnh thất bại');
    }
}
