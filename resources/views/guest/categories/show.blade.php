<h1>{{$category->name}}</h1>

@php
    $posts = $category->posts;
@endphp

    @foreach ($posts as $post)
        {{$post->title}}
        <br>
    @endforeach