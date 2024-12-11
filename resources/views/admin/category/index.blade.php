@extends('admin.layout')

@section('title', 'Category Manage')

@section('content')

    <form action="" method="POST" class="form-inline" role="form">
        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <button type="submit" class="btn btn-primary" aria-label="Submit">
            <i class="fa fa-search" style="font-size: 18px; color: rgb(0, 0, 0);"></i>
        </button>
        <a href="{{ route('admin.category.create') }}" class="btn btn-success ml-auto" title="Add new entry">
            <i class="fa fa-plus"></i> Add new
        </a>
    </form>

    <br>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Category Name</th>
                    <th>Category Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td> <!-- Số thứ tự -->
                        <td>{{ $category->name }}</td> <!-- Tên category -->
                        <td>{{ $category->status ? 'Visible' : 'Hidden' }}</td> <!-- Trạng thái -->
                        <td class="text-right">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>


@endsection
