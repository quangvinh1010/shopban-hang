@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $category->status ? 'selected' : '' }}>Visible</option>
                <option value="0" {{ !$category->status ? 'selected' : '' }}>Hidden</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
