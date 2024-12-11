@extends('layout')

@section('title', 'Create Post')

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('images/backgout.png') }}')">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span></p>

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">


        <!-- Displaying errors if there are any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container" style="margin-bottom: 50px">
            <!-- Form to create a new post -->
            <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data" class="form-style">
                @csrf

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Create Post</button>



            </form>
        </div>
    </div>

@endsection
