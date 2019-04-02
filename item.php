<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';
    protected $fillable = ['name','brand','image','description','price','discount','afterDiscPrice','stock'];
}
