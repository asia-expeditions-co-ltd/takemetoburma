<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CountView extends Model
{
     protected $table = 'tbl_countview';

       public static function Getdate($getde, $ip, $tour_id){
       return self::where(['created_at'=> $getde, 'ip'=> $ip, 'tour_id'=> $tour_id])->first();
    }

        public function tour(){
    	return $this->belongsTo(Tour::class);
    }
        public static  function getc(){
    	 $data = DB::table('tbl_countview as v')
    ->select('web.name as web_name',DB::Raw('v.id,t.title,t.slug  ,v.cityName, v.countryName ,v.timezone,v.ip as ip,v.tour_id as tour_id,v.created_at as month, count(*) as total '))->
    groupBy(DB::raw('(v.id),(v.tour_id),(v.ip),(v.cityName),(v.countryName),(v.timezone),(month),(t.title),(t.slug),(web_name)'))
    ->orderby('v.id', 'desc')
    ->join('tbl_tours as t', 't.id', '=', 'v.tour_id')
    ->join('tbl_website as web', 'v.web_id', '=', 'web.id')
    ->get();

	   return $data;
    }
         public static  function getcount_viewTours(){
         $data = DB::table('tbl_countview as v')
    ->select(DB::Raw('t.title as title, count(*) as total, v.tour_id as tour_id'))->
    groupBy(DB::raw('(v.tour_id),(title)'))
    ->orderby('total', 'desc')
    ->join('tbl_tours as t', 'v.tour_id', '=', 't.id')
    ->get();

       return $data;
    }



}
