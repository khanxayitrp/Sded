<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educationlevel extends Model
{
    protected $table = 'educationlevel';

    public function Staffon()
    {
    	return $this->hasMany(staff::class,'Edu_level');
    }
}
