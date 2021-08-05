<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $fillable = ['nome', 'email', 'senha'];

    public static function regrasCadastro()
    {
        return [
            'nome' => 'required|max:50',
            'email' => 'required|max:100',
            'senha' => 'required|min:8'
        ];
    }

    public static function regrasMensagensCadastro()
    {
        return [
            'nome.required' => 'Por favor, insira seu nome completo!',
            'nome.max' => 'Atenção: o tamanho máximo possível de seu nome é de 50 caracteres!',
            'email.required' => 'Por favor, insira um e-mail válido!',
            'email.max' => 'Atenção: o tamanho máximo possível de seu e-mail é de 100 caracteres!',
            'senha.required' => 'Por favor, insira uma senha válida!',
            'senha.min' => 'Atenção: a sua senha deve conter ao menos 8 caracteres!'
        ];
    }

    public static function regrasLogin()
    {
        return [
            'email' => 'required|max:100',
            'senha' => 'required|min:8'
        ];
    }

    public static function regrasMensagensLogin()
    {
        return [
            'email.required' => 'Por favor, insira um e-mail válido!',
            'email.max' => 'Atenção: o tamanho máximo de seu e-mail é de 100 caracteres!',
            'senha.required' => 'Por favor, insira uma senha válida!',
            'senha.min' => 'Atenção: o tamanho minímo da sua senha deve conter ao menos 8 caracteres!'
        ];
    }

    public static function regrasNome()
    {
        return [
            'nome' => 'required|max:50'
        ];
    }

    public static function regrasMensagemNome()
    {
        return [
            'nome.required' => 'Por favor, insira seu nome completo!',
            'nome.max' => 'Atenção: o tamanho máximo possível de seu nome é de 50 caracteres!'
        ];
    }

    public static function regrasEmail()
    {
        return [
            'email' => 'required|max:100'
        ];
    }

    public static function regrasMensagemEmail()
    {
        return [
            'email.required' => 'Por favor, insira um e-mail válido!',
            'email.max' => 'Atenção: o tamanho máximo possível de seu e-mail é de 100 caracteres!'
        ];
    }

    public static function regrasSenha()
    {
        return [
            'senha' => 'required|min:8'
        ];
    }

    public static function regrasMensagemSenha()
    {
        return [
            'senha.required' => 'Por favor, insira uma senha válida!',
            'senha.min' => 'Atenção: a sua senha deve conter ao menos 8 caracteres!'
        ];
    }
}
