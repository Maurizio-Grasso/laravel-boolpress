@extends('layouts.dash_alt')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-12">

            <h1>Tutti i Tag</h1>

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Modifica</th>
                        <th>Elimina</th>
                    </tr>            
                </thead>
        
                <tbody>

                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>

                        <td>
                            <form class="form-on-the-go" action="{{ route('admin.tags.update', ['tag' => $tag->id]) }}" method="post" enctype="multipart/form-data">                
                                @csrf
                                @method('PUT')
                                
                                    <input type="text" name="name" @error('name') is-invalid @enderror value="{{ old('title', $tag->name) }}" required>
                                    <button type="submit" class="my-btn my-btn--small my-btn--green"><i class="fas fa-redo-alt"></i></button>

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                
                            </form>
                        </td>

                        <td>                        
                            
                             <form class="d-inline-block" action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="my-btn my-btn--red my-btn--small">
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

            <h2>Crea Nuovo Tag</h2>

            <form class="form-on-the-go" action="{{ route('admin.tags.store')}}" method="post" enctype="multipart/form-data">                
                @csrf                
                
                    <input type="text" name="name" @error('name') is-invalid @enderror value="" placeholder="Inserisci nome nuovo tag" required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit" class="my-btn my-btn--medium my-btn--green">Aggiungi <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>

</div>

@endsection