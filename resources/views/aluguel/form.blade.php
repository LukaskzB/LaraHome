@extends('main')

@section('titulo', 'LaraHome - Aluguéis')

    @php
    if (!empty(Request::route('id'))) {
        $action = action('App\Http\Controllers\AluguelController@atualizar', $aluguel->id);
    } else {
        $action = action('App\Http\Controllers\AluguelController@store');
    }
    @endphp

@section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
        <h2>Formulário: aluguel</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $action }}" method="POST" class="col">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <label for="nome" class="form-label">Nome do anúncio</label>
                    <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome do anúncio" required
                        value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($aluguel->nome)){{ $aluguel->nome }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="endereco" class="form-label">Endereço da casa</label>
                    <input name="endereco" id="endereco" type="text" class="form-control"
                        placeholder="Avenida Paulista, Número 133, São Paulo" required value="@if (!empty(old('endereco'))) {{ old('endereco') }} @elseif(!empty($aluguel->endereco)){{ $aluguel->endereco }} @endif">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">E-mail para contato</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Seu@e-mail.com" required
                        value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($aluguel->email)){{ $aluguel->email }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="tamanho" class="form-label">Tamanho em m²</label>
                    <input name="tamanho" id="tamanho" type="text" class="form-control" placeholder="Tamanho útil" required
                        value="@if (!empty(old('tamanho'))) {{ old('tamanho') }} @elseif(!empty($aluguel->tamanho)){{ $aluguel->tamanho }} @endif">
                </div>
                <div class="col-md-2">
                    <label for="comodos" class="form-label">Quantidade de cômodos</label>
                    <input name="comodos" id="comodos" type="text" class="form-control" placeholder="Quantidade de cômodos"
                        required value="@if (!empty(old('comodos'))) {{ old('comodos') }} @elseif(!empty($aluguel->comodos)){{ $aluguel->comodos }} @endif">
                </div>
                <div class="col-md-2">
                    <label for="banheiros" class="form-label">Quantidade de banheiros</label>
                    <input name="banheiros" id="banheiros" type="text" class="form-control"
                        placeholder="Quantidade de banheiros" required value="@if (!empty(old('banheiros'))) {{ old('banheiros') }} @elseif(!empty($aluguel->banheiros)){{ $aluguel->banheiros }} @endif">
                </div>
                <div class="col-md-2">
                    <label for="dormitorios" class="form-label">Quantidade de dormitórios</label>
                    <input name="dormitorios" id="dormitorios" type="text" class="form-control"
                        placeholder="Quantidade de dormitórios" required value="@if (!empty(old('dormitorios'))) {{ old('dormitorios') }} @elseif(!empty($aluguel->dormitorios)){{ $aluguel->dormitorios }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="carros" class="form-label">Vagas na garagem</label>
                    <input name="carros" id="carros" type="text" class="form-control"
                        placeholder="Quantidade de vagas na garagem" required value="@if (!empty(old('carros'))) {{ old('carros') }} @elseif(!empty($aluguel->carros)){{ $aluguel->carros }} @endif">
                </div>
                <div class="col-md-2">
                    <label for="animal" class="form-label">Aceita animais</label>
                    <select name="animal" id="animal" class="form-select">
                        <option value="sim" @if (old('animal') == 'sim') selected @elseif(!empty($aluguel->animal) && $aluguel->animal == 'sim') selected @endif>
                            Sim</option>
                        <option value="nao" @if (old('animal') == 'nao') selected @elseif(!empty($aluguel->animal) && $aluguel->animal == 'nao') selected @endif>
                            Não</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="fumante" class="form-label">Aceita fumantes</label>
                    <select name="fumante" id="fumante" class="form-select">
                        <option value="sim" @if (old('fumante') == 'sim') selected @elseif(!empty($aluguel->fumante) && $aluguel->fumante == 'sim') selected @endif>
                            Sim</option>
                        <option value="nao" @if (old('fumante') == 'nao') selected @elseif(!empty($aluguel->fumante) && $aluguel->fumante == 'nao') selected @endif>
                            Não</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="valor" class="form-label">Valor do aluguel (mensal)</label>
                    <input name="valor" id="valor" type="text" class="form-control" placeholder="Valor em reais" required
                        value="@if (!empty(old('valor'))) {{ old('valor') }} @elseif(!empty($aluguel->valor)){{ $aluguel->valor }} @endif">
                </div>
                <div class="col-md-4">
                    <label for="locatario" class="form-label">Locatário</label>
                    <select name="locatario" id="locatario" class="form-select">
                        <option value="null" @if (old('locatario') == 'null') selected @elseif(!empty($aluguel->alugado) && $aluguel->alugado == null) selected @endif>Não há
                        </option>
                        @foreach ($locatarios as $loc)
                            <option value="{{ $loc->id }}" @if (old('locatario') == $loc->id) selected @elseif(!empty($aluguel->alugado) && $aluguel->alugado == $loc->id) selected @endif>{{ $loc->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="descricao" class="form-label">Descrição da casa</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="4" required
                        placeholder="Insira uma descrição breve para a casa"
                        class="form-control">@if (!empty(old('descricao'))) {{ old('descricao') }} @elseif(!empty($aluguel->descricao)){{ $aluguel->descricao }} @endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success"><i class="@if (!empty($aluguel->id)) fas fa-save
                        @else
                            fas fa-plus @endif"></i>
                        {{ empty($aluguel->id) ? 'Cadastrar' : 'Editar' }}</button>
                </div>
                <div class="col-md-auto" style="margin-top: 10px;">
                    @if (!empty($aluguel->id))
                        <a class="btn btn-danger"
                            href="{{ action('App\Http\Controllers\AluguelController@excluir', $aluguel->id) }}"
                            onclick="return confirm('Deseja realmente remover este anúncio? Atenção: essa ação não poderá ser desfeita!');"><i
                                class="fas fa-trash"></i> Remover</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
