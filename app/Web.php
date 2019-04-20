<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    //
    protected $table = 'tbl_website';

    public function tour(){
    	return $this->belongsToMany(Tour::class);
    }

    public function slide(){
    	return $this->belongsToMany(Slide::class);
    }

    public function events(){
    	return $this->belongsToMany(Events::class);
    }
}
