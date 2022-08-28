<?php

namespace FacaOBem\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Coleta extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'coletas';
	protected $primaryKey = 'idColeta';

    protected $fillable = [
        'situacao',
        'descricao',
        'data1',
        'turno1',
        'data2',
        'turno2',
    ];

    public static function buscarIdUsuario(string $idUsuario){
        return Capsule::select("
        SELECT idColeta, CONVERT(VARCHAR, created_at, 103) AS dataSolicitacao, descricao, 
               CONVERT(VARCHAR, data1, 103) + ' - ' + CASE WHEN turno1 = 'M' THEN 'Manh&atilde' ELSE 'Tarde' END + ' ou ' +
               CONVERT(VARCHAR, data2, 103) + ' - ' + CASE WHEN turno2 = 'M' THEN 'Manh&atilde' ELSE 'Tarde' END as datas
        FROM coletas
        WHERE idUsuario = ?", [$idUsuario]);
    }
}
