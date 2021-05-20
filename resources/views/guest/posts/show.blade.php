<h1>{{$post->title}}</h1>

<div>
    <p>{{$post->content}}</p>
</div>
<span>Autore: {{$post->user->name}}</span>
<br>
<span>Categoria: <a href="{{route('categories.show' , [ 'slug' => $post->category->slug])}}">{{$post->category->name}}</a></span>