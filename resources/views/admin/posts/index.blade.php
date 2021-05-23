@extends('layouts.dash_alt')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutti i posts</h1>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Slug</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>

                                {{-- Show --}}
                                <a class="my-btn my-btn--small my-btn--green" href="{{route('admin.posts.show' , $post->id)}}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a class="my-btn my-btn--small my-btn--orange" href="{{ route('admin.posts.edit', $post->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Delete --}}
                                <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="my-btn my-btn--small my-btn--red">
                                    <i class="far fa-trash-alt"></i>                                        
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <a href="{{ route('admin.posts.create') }}" class="my-btn my-btn--medium my-btn--green">
                Crea nuovo post <i class="fas fa-arrow-right"></i>
            </a>

        </div>
    </div>
</div>
@endsection
