<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web;
use App\Tour;
use App\Province;
use App\Country;
use App\Mail\RequestTeeTime;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ContactUs;



class HomeController extends Controller
{
    //
    public function index($home_id)
      {
        $project=\DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>$home_id])
        ->inRandomOrder()
        ->limit(5)
        ->orderBy('pro.province_order', 'DESC')
        ->get();

        
        return response()->json($project)->header("Access-Control-Allow-Origin",  "*");

      }
    public function getslide($home_id){
        $slide=\DB::table('tbl_slide')
                ->join('slide_web','tbl_slide.id','=','slide_web.slide_id')
                ->where(['slide_web.web_id'=>$home_id])
                ->get();

        return response()->json($slide)->header("Access-Control-Allow-Origin",  "*");

    }
    public function gettours($home_id,$more){
      $dataJson = [];
      if($more=='all'){            
            $tours = Web::find($home_id)->tour()->where(['status'=>1, 'type'=>1])->get();
            foreach ($tours as $tour) {            
              $dataJson[] = [ 'id'=>$tour->id,
                              'title'=>$tour->title,
                              'slug'=>$tour->slug,
                              'tour_price'=>$tour->tour_price,
                              'photo'=> $tour->photo,                          
                              'tour_desc'=>$tour->tour_desc,
                              'tour_highlight'=>$tour->tour_highlight,
                              'tour_remark'=>$tour->tour_remark,
                              'country_name'=>$tour->country->country_name,
                              'province_name'=>$tour->province->province_name,
                            ];
            }         
            
        }elseif($more=='0'){  
            $tours = Web::find(config('app.web'))->tour()->where(['status'=>1, 'type'=>1])->limit(6)->get();
            foreach ($tours as $tour) {            
              $dataJson[] = [ 'id'=>$tour->id,
                              'title'=>$tour->title,
                              'slug'=>$tour->slug,
                              'tour_price'=>$tour->tour_price,
                              'photo'=> $tour->photo,                          
                              'tour_desc'=>$tour->tour_desc,
                              'tour_highlight'=>$tour->tour_highlight,
                              'tour_remark'=>$tour->tour_remark,
                              'country_name'=>$tour->country->country_name,
                              'province_name'=>$tour->province->province_name,
                            ];
            }          

        }else {
          $tour = Tour::where('slug',$more)->first();     
          $dataGallery = [];
          $ImasgeGallery = explode(",", trim($tour->picture, ","));
          $dataOrg='http://takemetoburma.com/photos/share/';
          $dataThumb='http://takemetoburma.com/photos/share/thumbs/';

          foreach ($ImasgeGallery as $key => $value) {
            $dataGallery[] = ['original'=> $dataOrg.$value,'thumbnail'=>$dataThumb.$value];
            
          }          
            $dataJson[] = [ 'id'=>$tour->id,
                            'title'=>$tour->title,
                            'slug'=>$tour->slug,
                            'tour_price'=>$tour->tour_price,
                            'photo'=> $tour->photo, 
                            'gallery'=>$dataGallery,
                            'tour_desc'=>$tour->tour_desc,
                            'tour_highlight'=>$tour->tour_highlight,
                            'tour_remark'=>$tour->tour_remark,
                            'country_name'=>$tour->country->country_name,
                            'province_name'=>$tour->province->province_name,
                          ];
          
        }

        return response()->json($dataJson)->header("Access-Control-Allow-Origin",  "*");
        

    }
    public static function getdes_pro($home_id){
         $data = \DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where([ 'tour.status'         => 1,
                  'pro.province_status' => 1, 
                  'tour.country_id'     => 122,
                  'tweb.web_id'         => $home_id
                ])     
        ->limit(6)        
        ->get(); 
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");
    }

    public static function getpro($home_id){
         $data = \DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where([ 'tour.status'         => 1,
                  'pro.province_status' => 1, 
                  'tour.country_id'     => 122,
                  'tweb.web_id'         => $home_id,
                  
                ])                  
        ->get(); 
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");
    }

    public static function tour_bypro($pro_slug){
         $data = \DB::table('tbl_tours as tour')
        ->join('province as pro', 'tour.province_id', '=', 'pro.id')
        ->select('tour.*','pro.province_name')
        ->groupBy('tour.province_id')
        ->where([ 'tour.status'         => 1,
                  'pro.province_status' => 1,
                  'pro.slug'            => $pro_slug,
                ])
        ->get();
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");
    }

    public static function tour_in_tourdetail($tour_slug){
        $datatour = Tour::where('slug',$tour_slug)->first();

         $data = \DB::table('tbl_tours as tour')
        ->join('province as pro', 'tour.province_id', '=', 'pro.id')
        ->select('tour.*','pro.province_name')        
        ->where([ 'tour.status'         => 1,
                  'pro.province_status' => 1,
                  'tour.province_id'    => $datatour->province_id,
                ])
        ->get(); 
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");
    }

    public function ProDetail($home_id,$slug){
      if ($slug=='all') {
        $data = \DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where([ 'tour.status'         => 1,
                  'pro.province_status' => 1, 
                  'tour.country_id'     => 122,
                  'tweb.web_id'         => $home_id,
                  
                ])                  
        ->get(); 
        
      }else{
        $data = Province::where('slug',$slug)->first();
      }
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");       
    }

    public function sendContact(Request $req){
        $data = [
                 'fullname'=> $req->fullname,
                 'phone'=> $req->phone, 
                 'email'=> $req->email, 
                 'message'=> $req->message
             ];
        // Mail::to('lyheng@golftravelmyanmar.com')->send(new ContactUs($data));
        return response()->json('success')->header("Access-Control-Allow-Origin",  "*");

    }

}
