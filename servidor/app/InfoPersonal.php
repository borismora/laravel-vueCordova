<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPersonal extends Model
{
    protected $table = 'info_personal';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'rut',
    	'apellidos',
        'fecha_nacimiento',
        'foto'
    ];
}
