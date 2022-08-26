<?php

namespace FacaOBem\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coleta extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'coletas';
	protected $primaryKey = 'idColeta';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'situacao',
        'descricao',
        'data1',
        'turno1',
        'data2',
        'turno2',
    ];
}
