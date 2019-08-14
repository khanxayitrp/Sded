<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'payment';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }
}
