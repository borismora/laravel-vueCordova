<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoContacto extends Model
{
    protected $table = 'info_contacto';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'celular',
    	'fono_fijo',
    	'email',
        'facebook',
        'direccion'
    ];
}
