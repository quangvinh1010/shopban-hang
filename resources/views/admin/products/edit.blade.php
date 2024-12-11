@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" role="form" class="w-100 d-flex flex-wrap"
            enctype="multipart/form-data">
            @csrf <!-- CSRF Token for security -->
            @method('PUT') <!-- Use PUT method for updating -->

            <!-- Left Column -->
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name"
                        value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="desc">Product Description</label>
                    <textarea name="desc" class="form-control" id="desc" placeholder="Enter product description" rows="5">{{ old('desc', $product->desc) }}</textarea>
                    @error('desc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="other_img">Product Other Images</label>
                    <input type="file" id="other_img" name="other_img[]" class="form-control-file" multiple>
                    <hr>
                    <div class="row">
                        @foreach ($product->images as $img)
                            <div class="col-md-3 col-sm-4 col-6 position-relative mb-3">
                                <div class="thumbnail">
                                    <img src="{{ asset($img->img) }}" alt="Product Image" style="border: 1px solid"
                                        class="img-fluid">
                                    <!-- Image deletion form -->
                                    <a onclick="return confirm('Bạn muốn xoá hình ảnh?')" href="{{ route('admin.product.destroyImage', $img->id) }}" class="delete-btn">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category_id">Product Category</label>
                    <select name="category_id" class="form-control" id="category_id" required>
                        <option value="">Choose one---</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" id="price"
                        placeholder="Enter product price" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sale_price">Product Sale Price</label>
                    <input type="number" name="sale_price" class="form-control" id="sale_price"
                        placeholder="Enter sale price" value="{{ old('sale_price', $product->sale_price) }}">
                    @error('sale_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Status</label>
                    <div class="form-check">
                        <input type="radio" name="status" value="1" id="publish" class="form-check-input"
                            {{ old('status', $product->status) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish">Publish</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="status" value="0" id="hidden" class="form-check-input"
                            {{ old('status', $product->status) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="hidden">Hidden</label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="img">Primary Product Image</label>
                    <input type="file" name="img" class="form-control-file" id="img" accept="image/*">
                    
                   
                            <div class="">
                                <div class="">
                                   <img src="{{ url($product->img) }}" alt="Product Image" style="margin-top: 5px"
                                        class="img-fluid">
                                    <!-- Image deletion form -->
                                    
                                </div>
                            </div>
                    
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection
