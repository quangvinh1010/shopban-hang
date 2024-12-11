@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $user ? 'Edit User' : 'Create User' }}</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="{{ $user ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="post">
                        @csrf
                        @if ($user)
                            @method('PUT') <!-- This is for update -->
                        @endif
                    
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name"
                                value="{{ old('name', $user ? $user->name : '') }}" placeholder="name" required>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" name="email"
                                value="{{ old('email', $user ? $user->email : '') }}" placeholder="email" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword4"
                                placeholder="password" {{ $user ? '' : 'required' }}>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleSelectGender">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="user" {{ old('role', $user ? $user->role : '') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user ? $user->role : '') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-success mr-2">{{ $user ? 'Update' : 'Create' }}</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
