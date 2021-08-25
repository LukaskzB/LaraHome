@extends('main')

@section('titulo', 'LaraHome - Vendas')

@php
if (!empty(Request::route('id'))) {
    $action = action('App\Http\Controllers\VendaController@atualizar', $venda->id);
} else {
    $action = action('App\Http\Controllers\VendaController@store');
}
@endphp

@section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
        <h2>Formulário: venda</h2>

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
                        value="@if (!empty(old('nome'))){{old('nome')}}@elseif(!empty($venda->nome)){{$venda->nome}}@endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="endereco" class="form-label">Endereço da casa</label>
                    <input type="text" class="form-control" id="endereco" name="endereco"
                        placeholder="Avenida Paulista, Número 133, São Paulo" required value="@if (!empty(old('endereco'))){{old('endereco')}} @elseif (!empty($venda->endereco)){{$venda->endereco}}@endif">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">E-mail para contato</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu@e-mail.com" required
                        value="@if (!empty(old('email'))){{old('email')}}@elseif (!empty($venda->email)){{$venda->email}}@endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="tamanho" class="form-label">Tamanho em m²</label>
                    <input type="number" class="form-control" id="tamanho" name="tamanho" placeholder="Tamanho útil"
                        required value="@if (!empty(old('tamanho'))){{old('tamanho')}}@elseif (!empty($venda->tamanho)){{$venda->tamanho}}@endif">
                </div>
                <div class="col-md-2">
                    <label for="comodos" class="form-label">Quantidade de cômodos</label>
                    <input type="number" class="form-control" id="comodos" name="comodos"
                        placeholder="Quantidade de cômodos" required value="@if (!empty(old('comodos'))){{old('comodos')}}@elseif (!empty($venda->comodos)){{$venda->comodos}}@endif">
                </div>
                <div class="col-md-2">
                    <label for="banheiros" class="form-label">Quantidade de banheiros</label>
                    <input type="number" class="form-control" id="banheiros" name="banheiros"
                        placeholder="Quantidade de banheiros" required value="@if (!empty(old('banheiros'))) {{ old('banheiros') }} @elseif (!empty($venda->banheiros)){{$venda->banheiros}}@endif">
                </div>
                <div class="col-md-2">
                    <label for="dormitorios" class="form-label">Quantidade de dormitórios</label>
                    <input type="number" class="form-control" id="dormitorios" name="dormitorios"
                        placeholder="Quantidade de dormitórios" required value="@if (!empty(old('dormitorios'))){{old('dormitorios')}}@elseif (!empty($venda->dormitorios)){{$venda->dormitorios}}@endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="valor" class="form-label">Valor do imóvel</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor do imóvel em reais"
                        required value="@if (!empty(old('valor'))){{old('valor')}}@elseif (!empty($venda->valor)){{$venda->valor}}@endif">
                </div>
                <div class="col-md-2">
                    <label for="carros" class="form-label">Vagas na garagem</label>
                    <input type="number" class="form-control" id="carros" name="carros"
                        placeholder="Quantidade de vagas na garagem" required value="@if (!empty(old('carros'))){{old('carros')}} @elseif (!empty($venda->carros)){{$venda->carros}}@endif">
                </div>
                <div class="col-md-2">
                    <label for="proprietario" class="form-label">Proprietário</label>
                    <select name="proprietario" id="proprietario" class="form-select">
                        <option value="null" @if (old('proprietario') == 'null') selected @elseif(!empty($venda->vendido) && $venda->vendido == null) selected @endif>Não há
                        </option>
                        @foreach ($proprietarios as $pro)
                            <option value="{{ $pro->id }}" @if (old('proprietario') == $pro->id) selected @elseif(!empty($venda->vendido) && $venda->vendido == $pro->id) selected @endif>{{ $pro->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="descricao" class="form-label">Descrição da casa</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="4" required
                        placeholder="Insira uma descrição breve para a casa"
                        class="form-control">@if (!empty(old('descricao'))) {{ old('descricao') }} @elseif(!empty($venda->descricao)){{ $venda->descricao }} @endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success"><i class="  @if (!empty($venda->id)) fas fa-save
                        @else
                            fas fa-plus @endif"></i>
                        {{ empty($venda->id) ? 'Cadastrar' : 'Editar' }}</button>
                </div>
                <div class="col-md-auto" style="margin-top: 10px;">
                    @if (!empty($venda->id))
                        <a class="btn btn-danger"
                            href="{{ action('App\Http\Controllers\VendaController@excluir', $venda->id) }}"
                            onclick="return confirm('Deseja realmente remover este anúncio? Atenção: essa ação não poderá ser desfeita!');"><i
                                class="fas fa-trash"></i> Remover</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
