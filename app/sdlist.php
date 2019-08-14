<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sdlist extends Model
{
    protected $table = 'sdlist';

    public function Staffon()
    {
    	return $this->hasMany(staff::class,'SDlistID');
    }
}
