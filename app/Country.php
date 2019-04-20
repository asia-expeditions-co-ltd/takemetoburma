<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   
    protected $table = 'country';

    public function tour(){
    	return self::hasMany(Tour::class);
    }
    
    public function province (){
    	return $this->hasMany(Province::class);
    }
}
