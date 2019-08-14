<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activitytype extends Model
{
    protected $table = 'activitytype';

    public function GetActivityon()
    {
    	return $this->hasMany(activitys::class,'acttype');
    }
}
