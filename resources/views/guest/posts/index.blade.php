@foreach ($posts as $post)
    {{$post->title}} <a href="{{  route('posts.show' , [ 'slug' => $post->slug]) }}">Leggi tutto</a> <br>
@endforeach