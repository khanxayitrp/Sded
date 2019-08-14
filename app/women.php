<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class women extends Model
{
    protected $table = 'women';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }
}
