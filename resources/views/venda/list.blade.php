@extends('main')

@section('titulo', 'LaraHome - Vendas')

@section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
        <h2>Casas para vender</h2>

        <div class="row g-3">
            <div class="col-auto">
                <form action="{{ action('App\Http\Controllers\VendaController@search') }}" class="row g-3" method="POST">
                    @csrf
                    <div class="col-auto">
                        <input type="search" class="form-control" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                    </div>
                    <div class="col-auto">
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="nome" @if (!empty(old('tipo')) && old('tipo') == 'nome') selected @endif>Nome do anúncio</option>
                            <option value="endereco" @if (!empty(old('tipo')) && old('tipo') == 'endereco') selected @endif>Endereço</option>
                            <option value="proprietario" @if (!empty(old('tipo')) && old('tipo') == 'proprietario') selected @endif>Proprietário</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i>
                            Pesquisar</button>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <a class="btn btn-outline-danger"
                    href="{{ action('App\Http\Controllers\UsuarioController@PDFVenda') }}"><i class="far fa-file-pdf"></i>
                    PDF</a>
            </div>
            <div class="col-auto">
                <a href="{{ action('App\Http\Controllers\VendaController@cadastrar') }}" class="btn btn-success"><i
                        class="fas fa-plus"></i> Cadastrar</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Anúncio</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Cômodos</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Proprietário</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->endereco }}</td>
                        <td>{{ $item->tamanho }}m²</td>
                        <td>{{ $item->comodos }}</td>
                        <td>R${{ $item->valor }}</td>
                        <td>
                            {{ empty($item->vendido) ? '-' : $item->usuarios->nome }}
                        </td>
                        <td><a href="{{ action('App\Http\Controllers\VendaController@editar', $item->id) }}"
                                style="text-decoration: none">Detalhar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

@endsection
