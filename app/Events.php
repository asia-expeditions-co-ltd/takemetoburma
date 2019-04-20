<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    
    protected $table = 'tbl_events';

    public function web(){
    	return $this->belongsToMany(Web::class);
    }

    public function country(){
    	return $this->belongsTo(Country::class);
    }

    public function province(){
    	return $this->belongsTo(Province::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
