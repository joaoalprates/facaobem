<?php

namespace FacaOBem\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model as Model;

class Usuario extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'usuarios';
	protected $primaryKey = 'idUsuario';
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'municipio',
        'estado',
        'telefone',
    ];

    public static function buscarPorEmailSenha(string $email, string $senha){
        return Capsule::select("
        SELECT *
        FROM usuarios
        WHERE email = ? AND senha = ?", [$email, $senha]);
    }
}
