<?php

namespace FacaOBem\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Instituicao extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'instituicoes';
	protected $primaryKey = 'idInstituicao';
    protected $fillable = [
        'nome',
        'cnpj',
        'descricao',
        'situacao',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'municipio',
        'estado',
        'telefone',
    ];

    public static function buscarInstituicoesEstadoMunicipio(string $estado, string $municipio){
        return Capsule::select("
        SELECT nome, logradouro + ' ' + ISNULL(numero, '') + ' ' + ISNULL(complemento, '') as endereco, bairro, municipio, estado, cep
        FROM instituicoes
        WHERE estado = ? AND municipio = ?", [$estado, $municipio]);
    }

    public static function buscarInstituicoesEstado(string $estado){
        return Capsule::select("
        SELECT nome, logradouro + ' ' + ISNULL(numero, '') + ' ' + ISNULL(complemento, '') as endereco, bairro, municipio, estado, cep
        FROM instituicoes
        WHERE estado = ?", [$estado]);
    }

}
