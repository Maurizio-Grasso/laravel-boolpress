@extends('layouts.front_layout')

@section('content')

<div class="archive-heading">
    <h1 class="archive-heading__title">Ultimi Articoli Pubblicati</h2>
</div>

<div class="post-grid">

    @foreach ($posts as $post)
        <div class="single-post">
            <img class="single-post__image" src="{{$post->featured_img}}" alt=""> 
            <h3 class="single-post__title"><a href="{{  route('posts.show' , [ 'slug' => $post->slug]) }}">{{$post->title}}</a></h3>
        </div>
    @endforeach

</div>

@endsection