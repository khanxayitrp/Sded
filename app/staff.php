<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{

	protected $table = 'staff';

    protected $primaryKey = 'IDSDED';
	
    public function Sdlist()
    {
    	return $this->belongsTo(sdlist::class,'SDlistID');
    }

    public function Position()
    {
    	return $this->belongsTo(positionlevel::class,'PositionID');
    }

    public function Youthon()
    {
        return $this->hasOne(youth::class,'IDSDED');
    }

    public function Laoworkeron()
    {
        return $this->hasOne(laoworker::class,'IDSDED');
    }

    public function Womenon()
    {
        return $this->hasOne(women::class,'IDSDED');
    }

    public function Paymenton()
    {
        return $this->hasMany(payment::class,'IDSDED');
    }

    public function Activityson()
    {
        return $this->hasMany(activitys::class,'IDSDED');
    }

    public function Laoclanon()
    {
        return $this->belongsTo(laoclan::class,'id_Clan');
    }

    public function Educationlevelon()
    {
        return $this->belongsTo(educationlevel::class,'LevelID');
    }

    public function Laomemberon()
    {
        return $this->hasOne(laomember::class,'IDSDED');
    }

    public function Laosolideron()
    {
        return $this->hasOne(soldier::class,'IDSDED');
    }

    public function deleteRelateStaff()
    {
        $this->Youthon()->delete();
        $this->Laomemberon()->delete();
        $this->Laosolideron()->delete();
        $this->Laoworkeron()->delete();
        $this->Womenon()->delete();
        $this->Paymenton()->delete();
        $this->Activityson()->delete();
        return 1;
    }
}
