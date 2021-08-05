<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraHome - Vendas PDF</title>
</head>

<body
    style="margin-top: 50px; margin-bottom: 50px; margin-right: 30px; margin-left: 30px; width: 100%; height: 100vh; justify-content: center;">
    @if (!empty($vendas))
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Não há nenhum item para ser exibido.</h3>
    @endif
</body>

</html>
