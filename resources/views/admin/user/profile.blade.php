@extends('layouts.dash_alt')

@section('content')
    <h1>Dati Utente:</h1>
    <ul>
        <li>{{Auth::user()->name}}</li>
        <li>{{Auth::user()->email}}</li>
        @if(Auth::user()->api_token)
            <li>{{Auth::user()->api_token}}</li>
        @else
            <li>
                <form action="{{route('admin.generate-token')}}" method="POST">
                    @csrf
                    <button class="my-btn my-btn--small my-btn--green" type="submit">Crea Api token</button></li>
                </form>
        @endif

        <li></li>
        <li></li>
        <li></li>
    </ul>
@endsection