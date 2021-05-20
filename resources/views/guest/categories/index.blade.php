@foreach ($categories as $category)
    {{$category->name}} <a href="{{route('categories.show' , [ 'slug' => $category->slug]) }}">Vai</a><br>
@endforeach