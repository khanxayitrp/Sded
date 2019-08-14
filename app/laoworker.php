<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laoworker extends Model
{
    protected $table = 'laoworker';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }
}
