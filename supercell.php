<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supercell extends Model
{
	protected $table = 'user';
	protected $fillable = ['nama','email','password',];
}
