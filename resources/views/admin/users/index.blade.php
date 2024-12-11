@extends('admin.layout')

@section('title', 'User Manage')

@section('content')


    <form action="" method="POST" class="form-inline" role="form">
        <div class="form-group">
            <label for="email" class="sr-only"></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>

        <button type="submit" class="btn btn-primary" aria-label="Submit">
            <i class="fa fa-search" style="font-size: 18px; color: rgb(0, 0, 0);"></i>
        </button>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success ml-auto" title="Add new user">
            <i class="fa fa-plus"></i> Add New
        </a>
    </form>

    <br>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userList as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn muốn xóa user này? ')" title="Delete">
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
