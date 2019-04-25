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

    public static function getdes_pro(){
        return $data = \DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select(\DB::Raw('pro.province_name ,pro.id,pro.slug,pro.province_photo '))
        ->groupBy(\DB::raw('(pro.province_name),(pro.id),(pro.slug),(pro.province_photo )'))
        ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>config('app.web')])
        ->inRandomOrder()
        ->limit(6)
        ->orderBy('pro.province_order', 'DESC')
        ->get();   
    }
}
