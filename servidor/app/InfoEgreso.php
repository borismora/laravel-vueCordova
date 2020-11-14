<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoEgreso extends Model
{
    protected $table = 'info_egreso';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'titulo',
    	'año_ingreso',
    	'año_egreso',
    	'fecha_examen',
        'titulo_tm',
        'prof_guia'
    ];
}
