<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class AluguelController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::all();
        return view('aluguel.list')->with(['alugueis' => $alugueis]);
    }


    public function cadastrar()
    {
        $locatarios = Usuario::all();
        return view('aluguel.form')->with(['locatarios' => $locatarios]);
    }

    public function store(Request $request)
    {
        $request->validate(Aluguel::regrasAluguel(), Aluguel::regrasMensagemAluguel());
        Aluguel::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'tamanho' => $request->tamanho,
            'animal' => $request->animal == 'sim',
            'valor' => $request->valor,
            'comodos' => $request->comodos,
            'banheiros' => $request->banheiros,
            'descricao' => $request->descricao,
            'fumante' => $request->fumante == 'sim',
            'carros' => $request->carros,
            'dormitorios' => $request->dormitorios,
            'alugado' => $request->locatario == 'null' ? null : $request->locatario
        ]);

        return redirect()->action('App\Http\Controllers\AluguelController@index');
    }

    public function editar($id)
    {
        $aluguel = Aluguel::find($id);
        $locatarios = Usuario::all();

        return view('aluguel.form')->with(['aluguel' => $aluguel, 'locatarios' => $locatarios]);
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate(Aluguel::regrasAluguel(), Aluguel::regrasMensagemAluguel());

        Aluguel::updateOrCreate(['id' => $id], [
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'tamanho' => $request->tamanho,
            'animal' => $request->animal == 'sim',
            'valor' => $request->valor,
            'comodos' => $request->comodos,
            'banheiros' => $request->banheiros,
            'descricao' => $request->descricao,
            'fumante' => $request->fumante == 'sim',
            'carros' => $request->carros,
            'dormitorios' => $request->dormitorios,
            'alugado' => $request->locatario == 'null' ? null : $request->locatario
        ]);

        return redirect()->action('App\Http\Controllers\AluguelController@index');
    }

    public function excluir($id)
    {
        $aluguel = Aluguel::findOrFail($id);
        $aluguel->delete();

        return redirect()->action('App\Http\Controllers\AluguelController@index');
    }

    public function search(Request $request)
    {
        if ($request->tipo == 'locatario') {
            $result = Aluguel::whereHas('usuarios', function (Builder $query) use (&$request) {
                $query->where('nome', 'like', "%" . $request->pesquisar . "%");
            })->get();
        } else {
            $result = Aluguel::where($request->tipo, 'like', '%' . $request->pesquisar . '%')->get();
        }
        return view('aluguel.list')->with(['alugueis' => $result]);
    }
}
