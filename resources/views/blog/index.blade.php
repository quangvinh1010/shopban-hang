@extends('layout')

@section('title', 'Blog Posts')

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1>Blog Posts</h1>
                    <a href="{{ route('posts.create') }}">Create New Post</a>
                    <ul>
                        @foreach ($posts as $post)
                            
                        @endforeach
                    </ul>
                    <h1 class="mb-0 bread"></h1>
                </div>
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
                                <li>
                                    <h2>{{ $post->title }}</h2>
                                    <p>{{ $post->content }}</p> <!-- Hiển thị nội dung -->
                                    <p><a href="{{ route('posts.index', $post->id) }}">Đọc thêm</a></p>
                                    <!-- Link đến trang chi tiết -->
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="row mt-2">

                    </div>
                </div> <!-- .col-md-8 -->
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
                        <h3 class="heading">Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> April 27, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> April 27, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control
                                        about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> April 27, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
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
