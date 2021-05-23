@extends('layouts.front_layout')
@section('content')
    
    <div class="post-heading">
        <img class="post-heading__image" src="{{$post->featured_img}}" alt="">
        <h1 class="post-heading__title">{{$post->title}}</h1>

    </div>

    <div>
        <p>{!! $post->content !!}</p>
    </div>
    
    <span>Autore: {{$post->user->name}}</span>
    <br>
    {{-- <span>Categoria: <a href="{{route('categories.show' , [ 'slug' => $post->category->slug])}}">{{$post->category->name}}</a></span> --}}
@endsection