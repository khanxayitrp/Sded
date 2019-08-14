<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activitys extends Model
{
    protected $table = 'activitys';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }

    public function ActivityTypeon()
    {
    	return $this->belongsTo(activitytype::class,'Act_id');
    }
}
