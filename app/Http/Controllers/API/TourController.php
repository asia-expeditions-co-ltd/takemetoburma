<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Web;
use App\CountView;
use Illuminate\Support\Facades\Response;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {   
        $dataJson = [];
        if ($req->dest_name) {

            $tours   = Tour::where(['slug'=>$req->dest_name])->first();                
            $dataip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
            $data   = $dataip['geoplugin_request'];
            $today  = date('Y-m-d 00:00:00');
            // $yesterday = date('Y-m-d 00:00:00',strtotime(date($dt). "+1 days"));      
            if ($tours) {
                if ( !CountView::Getdate($today, $data , $tours->id)) {
                            $adds                 = new CountView;
                            $adds->ip             = $dataip['geoplugin_request'];
                            $adds->cityName       = $dataip['geoplugin_city'];
                            $adds->countryName    = $dataip['geoplugin_countryName'];
                            $adds->timezone       = $dataip['geoplugin_timezone'];
                            $adds->tour_id        = $tours->id;
                            $adds->web_id         = 1;
                            $adds->save();   
                }                    
            }
            $dataGallery = [];
            $ImasgeGallery = explode(",", trim($tours->picture, ","));
            $dataOrg='http://takemetoburma.com/photos/share/';
            $dataThumb='http://takemetoburma.com/photos/share/thumbs/';
                foreach ($ImasgeGallery as $key => $value) {
                    $dataGallery[] = ['original'=> $dataOrg.$value,'thumbnail'=>$dataThumb.$value];                
                }          
                    $dataJson[] = [ 'id'=>$tours->id,
                                    'title'=>$tours->title,
                                    'slug'=>$tours->slug,
                                    'tour_price'=>$tours->tour_price,
                                    'photo'=> $tours->photo, 
                                    'gallery'=>$dataGallery,
                                    'tour_desc'=>$tours->tour_desc,
                                    'tour_highlight'=>$tours->tour_highlight,
                                    'tour_remark'=>$tours->tour_remark,
                                    'country_name'=>$tours->country->country_name,
                                    'province_name'=>$tours->province->province_name,
                                  ];                  
                
            return response()->json($dataJson)->header("Access-Control-Allow-Origin",  "*");

        } elseif($req->web_id) {

            if($req->numTour){
            $dtours = Web::find($req->web_id)->tour()->where(['status'=>1, 'type'=>1])->limit($req->numTour)->get();
            }else{                           
            $dtours = Web::find($req->web_id)->tour()->where(['status'=>1, 'type'=>1])->get();
            }
            foreach ($dtours as $tour) {       
                $dataJson[] = [ 'id'             => $tour->id,
                                'title'          => $tour->title,
                                'slug'           => $tour->slug,
                                'tour_price'     => $tour->tour_price,
                                'photo'          => $tour->photo,                          
                                'tour_desc'      => $tour->tour_desc,
                                'tour_highlight' => $tour->tour_highlight,
                                'tour_remark'    => $tour->tour_remark,
                                'country_name'   => $tour->country->country_name,
                                'province_name'  => $tour->province->province_name,
                              ];
            }
            return Response::json($dataJson)->header("Access-Control-Allow-Origin",  "*");
        } elseif ($req->tour_bypro) {
            $datatour = Tour::where('slug',$req->tour_bypro)->first();

            $data = \DB::table('tbl_tours as tour')
                    ->join('province as pro', 'tour.province_id', '=', 'pro.id')
                    ->select('tour.*','pro.province_name')
                    ->where([ 'tour.status'         => 1,
                              'pro.province_status' => 1,
                              'tour.province_id'            => $datatour->province_id,
                            ])
                    ->get(); 
            return Response::json($data)->header("Access-Control-Allow-Origin",  "*");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::where(['id'=>$id, 'status'=>1])->first();
        if ($tour) {
            $gallery = [];
            $dataGallery = explode(',', trim($tour->tour_picture, ','));
            foreach ($dataGallery as $key => $val) {
                $gallery = ['gallery'=> $val];
            }
            $tourData = ['title'=>$tour->title, 'slug'=>$tour->slug, 'user'=>$tour->user, 'photo'=>$tour->photo, 'gallery'=>$gallery, 'country'=> $tour->country, 'province'=> $tour->province];
        }else{
            $tourData = ['message'=> "Not Found"];
        }
        return response()
            ->json($tourData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
