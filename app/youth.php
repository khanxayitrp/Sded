<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class youth extends Model
{
    protected $table = 'youth';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }
}
