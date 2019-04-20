<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'province';

    public function tour(){
    	return self::hasMany(Tour::class, 'id');
    }

    public function event(){
    	return self::hasMany(Events::class);
    }

    public function country(){
    	return $this->belongsTo(Country::class);
    }
}
