<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laomember extends Model
{
    protected $table = 'laomember';

    protected $primaryKey = 'LaoMemberID';

    public function Staffon()
    {
    	return $this->belongsTo(staff::class,'IDSDED');
    }
}
