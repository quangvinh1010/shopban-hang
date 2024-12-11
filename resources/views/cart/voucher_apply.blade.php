@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Apply Voucher') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('voucher.apply') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="voucher_code">{{ __('Voucher Code') }}</label>
                                <input type="text" name="voucher_code" id="voucher_code" class="form-control" value="{{ old('voucher_code') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Apply Voucher') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
