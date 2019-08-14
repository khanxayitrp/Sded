<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class positionlevel extends Model
{
	protected $table = 'positionlevel';

	public function Staffon()
    {
    	return $this->hasMany(staff::class,'PositionID');
    }
	//
}
