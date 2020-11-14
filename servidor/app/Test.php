<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $table = 'test';
    protected $primarykey = 'id';
    public $timestamps = false;

	protected $fillable = ['contenido'];
}