<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slideshow extends Model
{
	protected $fillable = [
        'slidename', 'slidepath',
    ];

    protected $table = 'slideshow';
    protected $primaryKey = 'slideID';
}
