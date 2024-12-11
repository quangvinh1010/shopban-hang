@extends('admin.layout')

@section('title', 'Create a New Product')

@section('content')
<div class="row">
    <form action="{{ route('admin.products.store') }}" method="POST" role="form" class="w-100 d-flex flex-wrap" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for security -->

        <!-- Left Column -->
        <div class="col-md-9">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" value="{{ old('name') }}" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="desc">Product Description</label>
                <textarea name="desc" class="form-control" id="desc" placeholder="Enter product description" rows="5">{{ old('desc') }}</textarea>
                @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="other_img">Additional Images</label>
                <input type="file" name="other_img[]" class="form-control-file" id="other_img" multiple>
                @error('other_img') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="category_id">Product Category</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">Choose one---</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Enter product price" value="{{ old('price') }}" required>
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="sale_price">Product Sale Price</label>
                <input type="number" name="sale_price" class="form-control" id="sale_price" placeholder="Enter sale price" value="{{ old('sale_price') }}">
                @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Product Status</label>
                <div class="form-check">
                    <input type="radio" name="status" value="1" id="publish" class="form-check-input" {{ old('status', 1) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="publish">Publish</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="status" value="0" id="hidden" class="form-check-input" {{ old('status') == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hidden">Hidden</label>
                </div>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="img">Primary Product Image</label>
                <input type="file" name="img" class="form-control-file" id="img" accept="image/*">
                @error('img') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                <i class="fa fa-save"></i> Save
            </button>
        </div>
    </form>
</div>
@endsection
