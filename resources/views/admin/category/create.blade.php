@extends('admin.layout')

@section('title', 'Create Category')

@section('content')
    <h2>Create New Category</h2>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" id="desc" name="desc" placeholder="Enter category description" required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Visible</option>
                <option value="0">Hidden</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
