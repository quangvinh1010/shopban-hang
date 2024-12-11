@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit User</h4>
                <p class="card-description"> Update user details </p>
                <form class="forms-sample" action="{{route('admin.users.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{ old('name', $user->name) }}" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" value="{{ old('email', $user->email) }}" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword4" placeholder="Leave blank if not changing">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
