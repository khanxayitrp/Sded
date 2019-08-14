<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soldier extends Model
{
	protected $table = 'soldier';

    public function Staffon()
    {
        return $this->belongsTo(staff::class,'IDSDED');
    }
}
