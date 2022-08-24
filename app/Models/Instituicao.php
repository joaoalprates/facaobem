<?php

namespace FacaOBem\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Capsule\Manager as Capsule;

class Instituicao extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'instituicoes';
	protected $primaryKey = 'idInstituicao';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nome',
        'cnpj',
        'descricao',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'municipio',
        'estado',
        'telefone',
    ];

    public static function buscarInstituicoes(string $estado, string $municipio){
        return Capsule::select("
        SELECT *
        FROM instituicoes
        WHERE estado = ? AND municipio = ?", [$estado, $municipio]);
    }
}
