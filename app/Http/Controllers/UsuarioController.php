<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Usuario;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class UsuarioController extends Controller
{

    public function index()
    {
        if (session()->has('Usuario')) {
            session()->pull('Usuario');
        }
        return view('login.login');
    }

    public function indexCadastro()
    {
        if (session()->has('Usuario')) {
            session()->pull('Usuario');
        }
        return view('login.cadastro');
    }

    public function login(Request $request)
    {
        $request->validate(Usuario::regrasLogin(), Usuario::regrasMensagensLogin());

        $result = Usuario::where('email', $request->email)->first();

        if (empty($result->senha) || $result->senha !== hash('sha256', $request->senha)) {
            return redirect()->back()->withErrors(['senha' => 'A senha inserida é inválida ou a conta não existe.'])->withInput();
        } else {
            $request->session()->put('Usuario', $result->id);
            return redirect()->action('App\Http\Controllers\AluguelController@index');
        }
    }

    public function sair()
    {
        if (session()->has('Usuario')) {
            session()->pull('Usuario');
            return redirect()->action('App\Http\Controllers\UsuarioController@index');
        }
    }


    public function cadastrar(Request $request)
    {
        $request->validate(Usuario::regrasCadastro(), Usuario::regrasMensagensCadastro());

        $result1 = Usuario::where('email', $request->email)->first();

        if (!empty($result1)) {
            return redirect()->back()->withErrors(['email' => 'O e-mail inserido já está cadastrado!'])->withInput();
        } else {
            $result = Usuario::create([
                'nome' => $request->nome,
                'senha' => hash('sha256', $request->senha),
                'email' => $request->email
            ]);

            $request->session()->put('Usuario', $result->id);

            return redirect()->action('App\Http\Controllers\AluguelController@index');
        }
    }

    public function perfil()
    {
        $id = session('Usuario', null);
        $perfil = Usuario::findOrFail($id);
        return view('login.perfil')->with(['perfil' => $perfil]);
    }

    public function atualizarNome(Request $request, $id)
    {
        $request->validate(Usuario::regrasNome(), Usuario::regrasMensagemNome());
        $user = Usuario::findOrFail($id);
        $user->update(['nome' => $request->nome]);
        return redirect()->action('App\Http\Controllers\UsuarioController@perfil');
    }

    public function atualizarEmail(Request $request, $id)
    {
        $request->validate(Usuario::regrasEmail(), Usuario::regrasMensagemEmail());
        $user = Usuario::findOrFail($id);
        $user->update(['email' => $request->email]);
        return redirect()->action('App\Http\Controllers\UsuarioController@perfil');
    }

    public function atualizarSenha(Request $request, $id)
    {
        $request->validate(Usuario::regrasSenha(), Usuario::regrasMensagemSenha());
        $user = Usuario::findOrFail($id);
        $user->update(['senha' => hash('sha256', $request->senha)]);
        return redirect()->action('App\Http\Controllers\UsuarioController@perfil');
    }

    public function excluirConta($id)
    {
        $user = Usuario::findOrFail($id);
        $user->delete();
        return redirect()->action('App\Http\Controllers\UsuarioController@index');
    }

    public function PDFAluguel()
    {
        $alugueis = Aluguel::all();
        return PDF::loadView('aluguel.pdf', compact('alugueis'))->download('alugueis.pdf');
    }

    public function PDFVenda()
    {
        $vendas = Venda::all();
        return PDF::loadView('venda.pdf', compact('vendas'))->download('vendas.pdf');
    }
}
