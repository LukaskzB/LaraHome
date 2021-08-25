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
            'tamanho' => 'required|numeric',
            'comodos' => 'required|integer',
            'carros' => 'required|integer',
            'banheiros' => 'required|integer',
            'dormitorios' => 'required|integer',
            'valor' => 'required|numeric',
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
            'tamanho.numeric' => 'Atenção: o valor do tamanho precisa ser um número!',
            'comodos.required' => 'Por favor, insira a quantidade de cômodos.',
            'comodos.integer' => 'Atenção: a quantidade de comôdos precisa ser um número inteiro!',
            'carros.required' => 'Por favor, insira a quantidade de vagas de automóveis.',
            'carros.integer' => 'Atenção: a quantidade de vagas na garragem precisa ser um número inteiro!',
            'banheiros.required' => 'Por favor, insira a quantidade de banheiros.',
            'banheiros.integer' => 'Atenção: a quantidade de banheiros precisa ser um número inteiro!',
            'dormitorios.required' => 'Por favor, insira a quantidade de dormitórios.',
            'dormitorios.integer' => 'Atenção: a quantidade de dormitórios precisa ser um número inteiro!',
            'valor.required' => 'Por favor, insira um valor.',
            'valor.numeric' => 'Atenção: o valor do valor precisa ser um número!',
            'descricao.required' => 'Por favor, insira uma descrição.',
            'descricao.max' => 'Atenção: o tamanho máximo possível da descrição é de 300 caracteres!'
        ];
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'vendido', 'id');
    }
}
