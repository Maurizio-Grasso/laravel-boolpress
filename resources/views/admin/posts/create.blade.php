@extends('layouts.dash_alt')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center">
                <h1>Crea nuovo post</h1>
            </div>

            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form class="custom-form" action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                {{-- Add Title --}}
                <div class="custom-form__form-group">
                    <label for="input-title" class="custom-form__label">Titolo</label>
                    <input id="input-title" type="text" name="title" class="custom-form__input @error('title') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Add Featured Image --}}

                <div class="custom-form__form-group">
                    <label for="input-featured_img" class="custom-form__label">Immagine di Copertina</label>
                    <input id="input-featured_img" type="text" name="featured_img" class="custom-form__input @error('featured_img') is-invalid @enderror" placeholder="URL immagine di copertina" value="{{ old('featured_img') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Add Content --}}
                <div class="custom-form__form-group custom-form__form-group--large">
                    <label for="textarea-content" class="custom-form__label">Contenuto</label>
                    <textarea id="textarea-content" name="content" class="custom-form__input @error('content') is-invalid @enderror" rows="10" placeholder="Inizia a scrivere qualcosa..." required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Add Tags --}}
                <div class="custom-form__form-group custom-form__form-group--checkboxes">
                    <h4>Seleziona i tag:</h4>
                    @foreach ($tags as $tag)
                        <div class="@error('tags') is-invalid @enderror">
                            <input name="tags[]" class="custom-form__checkbox"  id="checkbox-{{ $tag->slug }}" type="checkbox" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked=checked' : '' }}>

                            <label class="custom-form__checkbox-label" for="checkbox-{{ $tag->slug }}">
                                {{ $tag->name }}
                            </label>

                        </div>
                    @endforeach

                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                {{-- Add Category --}}                
                <div class="custom-form__form-group">
                    
                    <label for="select-category" class="custom-form__label">Seleziona Categoria</label>
                    
                    <select id="select-category" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">-- seleziona categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                {{-- Submit --}}
                
                <div class="custom-form__form-group">
                    <button type="submit" class="my-btn my-btn--medium my-btn--green">
                        Pubblica <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
