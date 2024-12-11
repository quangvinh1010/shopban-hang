@extends('admin.layout')

@section('content')
    <h3>Create Order</h3>

    <form action="{{ route('admin.orders.store') }}" method="POST" class="form-horizontal" role="form">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-2 col-form-label">Address</label>
            <div class="col-md-10">
                <textarea class="form-control" id="address" name="address" placeholder="Enter address">{{ old('address') }}</textarea>
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="user_id" class="col-md-2 col-form-label">Select User</label>
            <div class="col-md-10">
                <select class="form-control" id="user_id" name="user_id">
                    <option value="">Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-10 offset-md-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
