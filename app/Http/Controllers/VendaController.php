<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PDF;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::all();
        return view('venda.list')->with(['vendas' => $vendas]);
    }

    public function cadastrar()
    {
        $proprietarios = Usuario::all();
        return view('venda.form')->with(['proprietarios' => $proprietarios]);
    }

    public function store(Request $request)
    {
        $request->validate(Venda::regrasVenda(), Venda::regrasMensagemVenda());
        Venda::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'tamanho' => $request->tamanho,
            'valor' => $request->valor,
            'comodos' => $request->comodos,
            'banheiros' => $request->banheiros,
            'descricao' => $request->descricao,
            'carros' => $request->carros,
            'dormitorios' => $request->dormitorios,
            'vendido' => $request->proprietario == 'null' ? null : $request->proprietario
        ]);

        return redirect()->action('App\Http\Controllers\VendaController@index');
    }

    public function editar($id)
    {
        $venda = Venda::find($id);
        $proprietarios = Usuario::all();

        return view('venda.form')->with(['venda' => $venda, 'proprietarios' => $proprietarios]);
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate(Venda::regrasVenda(), Venda::regrasMensagemVenda());

        Venda::updateOrCreate(['id' => $id], [
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'tamanho' => $request->tamanho,
            'comodos' => $request->comodos,
            'carros' => $request->carros,
            'banheiros' => $request->banheiros,
            'dormitorios' => $request->dormitorios,
            'valor' => $request->valor,
            'descricao' => $request->descricao,
            'vendido' => $request->proprietario == 'null' ? null : $request->proprietario
        ]);

        return redirect()->action('App\Http\Controllers\VendaController@index');
    }

    public function excluir($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();

        return redirect()->action('App\Http\Controllers\VendaController@index');
    }

    public function search(Request $request)
    {
        if ($request->tipo == 'proprietario') {
            $result = Venda::whereHas('usuarios', function (Builder $query) use (&$request) {
                $query->where('nome', 'like', "%" . $request->pesquisar . "%");
            })->get();
        } else {
            $result = Venda::where($request->tipo, 'like', '%' . $request->pesquisar . '%')->get();
        }
        return view('venda.list')->with(['vendas' => $result]);
    }
}
