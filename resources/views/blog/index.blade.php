@extends('layout')

@section('title', 'Blog Posts')

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <h1 class="mb-0 bread">Blog Posts</h1> <!-- Added heading here -->
            </div>
        </div>
    </div>

    

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last ftco-animate">
                    <div class="row">
                        <ul>
                            @foreach ($posts as $post)
                                <li style="display: flex; align-items: center; margin-bottom: 20px;">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                    @endif
                                    <div style="flex-grow: 1; padding-right: 20px;">
                                        <h2>{{ $post->title }}</h2>
                                        <p>{{ Str::limit($post->content, 150) }}</p> <!-- Shortened content to 150 characters -->
                                    </div>
                                    <p><a href="{{ route('posts.show', $post->id) }}">Read more</a></p> <!-- Link to post details -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-md-9 ftco-animate text-center">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a> 
                    
                </div>
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Shoes <span>(12)</span></a></li>
                            <li><a href="#">Men's Shoes <span>(22)</span></a></li>
                            <li><a href="#">Women's <span>(37)</span></a></li>
                            <li><a href="#">Accessories <span>(42)</span></a></li>
                            <li><a href="#">Sports <span>(14)</span></a></li>
                            <li><a href="#">Lifestyle <span>(140)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">shop</a>
                            <a href="#" class="tag-cloud-link">products</a>
                            <a href="#" class="tag-cloud-link">shirt</a>
                            <a href="#" class="tag-cloud-link">jeans</a>
                            <a href="#" class="tag-cloud-link">shoes</a>
                            <a href="#" class="tag-cloud-link">dress</a>
                            <a href="#" class="tag-cloud-link">coats</a>
                            <a href="#" class="tag-cloud-link">jumpsuits</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                            similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
