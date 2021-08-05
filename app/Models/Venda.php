<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'venda';
    protected $fillable = [
        'nome',
        'endereco',
        'email',
        'tamanho',
        'comodos',
        'carros',
        'banheiros',
        'dormitorios',
        'valor',
        'descricao',
        'vendido'
    ];

    public static function regrasVenda()
    {
        return [
            'nome' => 'required|max:50',
            'endereco' => 'required|max:80',
            'email' => 'required|max:100',
            'tamanho' => 'required',
            'comodos' => 'required',
            'carros' => 'required',
            'banheiros' => 'required',
            'dormitorios' => 'required',
            'valor' => 'required',
            'descricao' => 'required|max:300'
        ];
    }

    public static function regrasMensagemVenda()
    {
        return [
            'nome.required' => 'Por favor, insira um nome ao anúncio.',
            'nome.max' => 'Atenção: o tamanho máximo possível do nome do anúncio é de 50 caracteres!',
            'endereco.required' => 'Por favor, insira um endereço.',
            'endereco.max' => 'Atenção: o tamanho máximo possível do endereço é de 80 caracteres!',
            'email.required' => 'Por favor, insira um e-mail de contato.',
            'email.max' => 'Atenção: o tamanho máximo possível do e-mail é de 100 caracteres.',
            'tamanho.required' => 'Por favor, insira um tamanho.',
            'comodos.required' => 'Por favor, insira a quantidade de cômodos.',
            'carros.required' => 'Por favor, insira a quantidade de vagas de automóveis.',
            'banheiros.required' => 'Por favor, insira a quantidade de banheiros.',
            'dormitorios.required' => 'Por favor, insira a quantidade de dormitórios.',
            'valor.required' => 'Por favor, insira um valor.',
            'descricao.required' => 'Por favor, insira uma descrição.',
            'descricao.max' => 'Atenção: o tamanho máximo possível da descrição é de 300 caracteres!'
        ];
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'vendido', 'id');
    }
}
