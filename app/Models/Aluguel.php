<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    protected $table = 'aluguel';
    protected $fillable = [
        'nome',
        'endereco',
        'email',
        'tamanho',
        'animal',
        'valor',
        'comodos',
        'banheiros',
        'descricao',
        'fumante',
        'carros',
        'banheiros',
        'dormitorios',
        'alugado'
    ];

    public static function regrasAluguel()
    {
        return [
            'nome' => 'required|max:50',
            'endereco' => 'required|max:80',
            'email' => 'required|max:100',
            'tamanho' => 'required|numeric',
            'animal' => 'required',
            'valor' => 'required|numeric',
            'comodos' => 'required|integer',
            'banheiros' => 'required|integer',
            'descricao' => 'required|max:300',
            'fumante' => 'required',
            'carros' => 'required|integer',
            'dormitorios' => 'required|integer'
        ];
    }

    public static function regrasMensagemAluguel()
    {
        return [
            'nome.required' => 'Por favor, insira um nome ao anúncio.',
            'nome.max' => 'Atenção: o tamanho máximo possível do nome do anúncio é de 50 caracteres!',
            'endereco.required' => 'Por favor, insira um endereço.',
            'endereco.max' => 'Atenção: o tamanho máximo possível do endereço é de 80 caracteres!',
            'email.required' => 'Por favor, insira um e-mail de contato.',
            'email.max' => 'Atenção: o tamanho máximo possível do e-mail é de 100 caracteres!',
            'tamanho.required' => 'Por favor, insira um tamanho.',
            'tamanho.numeric' => 'Atenção: o valor do tamanho precisa ser um número!',
            'animal.required' => 'Por favor, selecione um valor para a permissão de animais.',
            'valor.required' => 'Por favor, insira um valor.',
            'valor.numeric' => 'Atenção: o valor do valor precisa ser um número!',
            'comodos.required' => 'Por favor, insira a quantidade de cômodos.',
            'comodos.integer' => 'Atenção: a quantidade de comôdos precisa ser um número inteiro!',
            'banheiros.required' => 'Por favor, insira a quantidade de banheiros.',
            'banheiros.integer' => 'Atenção: a quantidade de banheiros precisa ser um número inteiro!',
            'descricao.required' => 'Por favor, insira uma descrição.',
            'descricao.max' => 'Atenção: o tamanho máximo possível da descrição é de 300 caracteres!',
            'fumante.required' => 'Por favor, selecione um valor para a permissão de fumar.',
            'carros.required' => 'Por favor, insira a quantidade de vagas de automóveis.',
            'carros.integer' => 'Atenção: a quantidade de vagas da garragem precisa ser um número inteiro!',
            'dormitorios.required' => 'Por favor, insira a quantidade de dormitórios.',
            'dormitorios.integer' => 'Atenção: a quantidade de dormitórios precisa ser um número inteiro!'
        ];
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'alugado', 'id');
    }
}
