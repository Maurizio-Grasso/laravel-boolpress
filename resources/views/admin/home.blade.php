@extends('layouts.dash_alt')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    {{ __('Ti sei Autenticato come ') }} <strong>{{Auth::user()->name}}</strong>
                    <p>Usa il menu nella barra laterale sinistra per iniziare a scrivere contenuti</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
