@extends('layout')

@section('title', 'List Product')

@section('content')
<ul>
        @if (isset($categories) && $categories->count() > 0)
            @foreach ($categories as $category)
                <li>{{ $category->name }} - {{ $category->description }}</li>
            @endforeach
        @else
            <li>Không có danh mục nào</li>
        @endif
    </ul>
    

@endsection