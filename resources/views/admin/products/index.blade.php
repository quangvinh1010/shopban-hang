@extends('admin.layout')

@section('title', 'Product Manage')

@section('content')

    <form action="" method="POST" class="form-inline" role="form">
        @csrf
        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <button type="submit" class="btn btn-primary" aria-label="Search">
            <i class="fa fa-search" style="font-size: 18px; color: rgb(0, 0, 0);"></i>
        </button>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success ml-auto" title="Add new entry">
            <i class="fa fa-plus"></i> Add new
        </a>
    </form>

    <br>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category ID</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $model)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ Str::limit($model->name, 30, '...') }}</td> <!-- Giới hạn 30 ký tự -->
                        <td>{{ $model->category->name }}</td>
                        <td>
                            {{ $model->price }}

                        </td>
                        <td>
                            @if ($model->sale_price)
                                <span>{{ $model->sale_price }}</span>
                            @endif
                        </td>
                        <td>{{ $model->status == 0 ? 'Hidden' : 'Published' }}</td>
                        <td>
                            <img src="{{ url($model->img) }}" width="50px" alt="Product Image">
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.products.edit', $model->id) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $model->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
