@extends('app')

@section('titulo', 'LaraHome - Cadastro')

    @php
    session_start();
    $_SESSION['usuario'] = null;
    @endphp

@section('content')
    <div
        style="display: flex; justify-content: center; align-items: center;width: 100%; height: 100%; flex-direction: column; background-image: url('https://i.ibb.co/djxsh5h/4858794.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">

        <div
            style="width: 20%; height: 60%; flex-direction: column; justify-content: flex-start; background-color: #fcfcfc; border-radius: 10px; border-width: 2px; border-color: #fafafa; border-style: solid; padding: 30px">
            <h1 style="text-align: center; font-size: 60px;">
                LaraHome</h1>

            <form action="{{ action('App\Http\Controllers\UsuarioController@cadastrar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label" style="margin-top: 30px">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        placeholder="Por favor, insira seu nome completo" aria-describedby="nomeHelp"
                        value="{{ old('nome') }}" required>
                    <span class="text-danger">@error('nome') {{ $message }}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Por favor, insira seu e-mail" aria-describedby="emailhelp" value="{{ old('email') }}"
                            required>
                        <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" required id="senha" name="senha"
                                placeholder="Por favor, insira sua senha" aria-describedby="senhaHelp">
                            <span class="text-danger">@error('senha') {{ $senha }}@enderror</span>
                            </div>

                            <div class="d-grid gap-2" style="margin-top: 30px;">
                                <button class="btn btn-success" type="submit">Cadastrar</button>
                                <a class="btn btn-secondary" href="{{ url('/') }}">Entrar</a>
                            </div>

                        </form>

                    </div>
                </div>
            @endsection
