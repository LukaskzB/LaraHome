@extends('app')

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ action('App\Http\Controllers\AluguelController@index') }}" class="navbar-brand">LaraHome</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ action('App\Http\Controllers\AluguelController@index') }}" class="nav-link">Aluguéis
                            de
                            casas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ action('App\Http\Controllers\VendaController@index') }}" class="nav-link">Venda de
                            casas</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ action('App\Http\Controllers\UsuarioController@perfil') }}"
                                class="nav-link">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('App\Http\Controllers\UsuarioController@sair') }}"
                                class="nav-link">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
@endsection
