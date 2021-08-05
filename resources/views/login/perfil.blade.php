@extends('main')

@section('titulo', 'LaraHome - Vendas')

@section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
        <h2>Perfil</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ action('App\Http\Controllers\UsuarioController@atualizarNome', ['id' => $perfil->id]) }}"
            method="POST" class="row g-3">
            @csrf

            <div class="col-md-4">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome completo" required
                    value="@if (!empty($perfil->nome)) {{ $perfil->nome }} @endif">
                <span class="text-danger">@error('nome')
                        {{ $message }}
                    @enderror</span>
            </div>

            <div class="col-md-1" style="align-self: flex-end">
                <button type="submit" id="botao" name="botao" class="btn btn-outline-success">Editar nome</button>
            </div>
        </form>

        <form action="{{ action('App\Http\Controllers\UsuarioController@atualizarEmail', ['id' => $perfil->id]) }}"
            method="POST" class="row g-3">
            @csrf

            <div class="col-md-4">
                <label for="nome" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Seu@e-mail.com" required
                    value="@if (!empty($perfil->email)) {{ $perfil->email }} @endif">
                <span class="text-danger">@error('email')
                        {{ $message }}
                    @enderror</span>
            </div>

            <div class="col-md-1" style="align-self: flex-end">
                <button type="submit" id="botao" name="botao" class="btn btn-outline-success">Trocar e-mail</button>
            </div>
        </form>

        <form action="{{ action('App\Http\Controllers\UsuarioController@atualizarSenha', ['id' => $perfil->id]) }}"
            method="POST" class="row g-3">
            @csrf

            <div class="col-md-4">
                <label for="nome" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira uma nova senha"
                    required>
                <span class="text-danger">@error('senha')
                        {{ $message }}
                    @enderror</span>
            </div>

            <div class="col-md-1" style="align-self: flex-end">
                <button type="submit" id="botao" name="botao" class="btn btn-outline-success">Trocar senha</button>
            </div>
            <div class="col-md-1" style="align-self: flex-end">
                <a id="botao" name="botao" class="btn btn-outline-danger"
                    onclick="return confirm('Deseja realmente excluir esta conta? Atenção: essa ação não poderá ser desfeita!');"
                    href="{{ action('App\Http\Controllers\UsuarioController@excluirConta', ['id' => $perfil->id]) }}">Excluir
                    conta</a>
            </div>
        </form>


    </div>

@endsection
