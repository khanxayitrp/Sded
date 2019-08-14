<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laoclan extends Model
{
    protected $table = 'laoclan';

    public function Staffon()
    {
    	return $this->hasMany(staff::class,'Clan');
    }
}
