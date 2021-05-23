@extends('layouts.dash_alt')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12">

            <h1>Tutte le Categorie</h1>

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

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>

                        <td>
                            <form class="form-on-the-go" action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">                
                                @csrf
                                @method('PUT')
                                
                                    <input type="text" name="name" @error('name') is-invalid @enderror value="{{ old('name', $category->name) }}" required>
                                    <button type="submit" class="my-btn my-btn--small my-btn--green"><i class="fas fa-redo-alt"></i></button>

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                
                            </form>
                        </td>

                        <td>                        
                            
                             <form class="d-inline-block" action="{{route('admin.categories.destroy', $category->id)}}" method="post">
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

            <h2>Crea Nuova Categoria</h2>

            <form class="form-on-the-go" action="{{ route('admin.categories.store')}}" method="post" enctype="multipart/form-data">                
                @csrf                
                
                    <input type="text" name="name" @error('name') is-invalid @enderror value="" placeholder="Nome nuova categoria" required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit" class="my-btn my-btn--medium my-btn--green">Aggiungi</button>
            </form>
        </div>
    </div>

</div>
@endsection
