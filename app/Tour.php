<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    protected $table = 'tbl_tours';

    public function web(){
    	return $this->belongsToMany(Web::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
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

    public static function getcatTour( $cat_id, $web, $type = 1, $location = 126){
        return $users = \DB::table('tbl_tours as tour')
            ->join('tour_web as web', 'tour.id', '=', 'web.tour_id')
            ->join('category_tour as cat', 'tour.id', '=', 'cat.tour_id')
            ->where(['category_id'=>$cat_id, 'type'=>$type, 'web.web_id'=>$web,'tour.province_id'=>$location,'tour.status'=>1])
            ->paginate(12);    
    }
    
}
