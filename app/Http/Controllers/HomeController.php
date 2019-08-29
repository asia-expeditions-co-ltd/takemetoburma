<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\GolfPackage;
use \App\Country;
use App\Province;
use App\Web;

use Illuminate\Support\Facades\Mail;
use \App\Mail\RequestTeeTime;
use \App\Mail\ContactUs;
use App\Tour;
use App\Category;
use App\Events;
use App\Slide;
use App\CountView;
use Illuminate\Http\RedirectResponse;


class HomeController extends Controller
{
    //redirect to the home page of webpage
    public function getHome(){

        $getSlide = Web::find(config('app.web'))->slide()->orderBy('id', 'DESC')->get();
        $webs = Web::find(config('app.web'))->tour()->where(['status'=>1, 'type'=>1])->paginate(6);
        return view('index', compact('webs', 'getSlide'));
    }


    public function getDestination(Request $req){
        if ( !empty($req->location) && $req->tour_type != '' && !empty($req->cat) ){
            $prov=Province::where('slug', $req->location)->first();
            $cat = Category::find($req->cat);       
            $tours=Tour::getcatTour($req->cat, config('app.web'), $req->tour_type, $prov->id);
        }elseif (!empty($req->location) && $req->tour_type != '') {
            $cat = Category::find($req->cat);
            $prov=Province::where('slug', $req->location)->first();
            $tours=Web::find(config('app.web'))->tour()->where(['status'=>1, 'type'=> $req->tour_type, 'province_id'=>$prov->id])->orderBy('id', 'DESC')->paginate(12);
        }elseif (!empty($req->location)) {
            $prov=Province::where('slug', $req->location)->first();     
            $tours=Web::find(config('app.web'))->tour()->where(['status'=>1, 'province_id'=>$prov->id])->orderBy('id', 'DESC')->paginate(12);
            $cat = Category::find($req->cat);
        }elseif ($req->cat != '') {
            $prov= '';
            $cat = Category::find($req->cat);
            $tours=Tour::getcatTour($req->cat, config('app.web'));
        }else{
            $prov= '';
            $cat = Category::find(0);
            $tours=Web::find(config('app.web'))->tour()->where(['status'=>1,'type'=> 1])->orderBy('id', 'DESC')->paginate(12);
        }
        // return $cat;
        $recentTour=Web::find(config('app.web'))->tour()->where(['status'=>1, 'type'=> 1])->take(6)->orderBy('id', 'DESC')->get();
        
        return view('destination.destination', compact('tours', 'prov', 'recentTour', 'cat'));
    }

    // get view single tour
    public function getTour($dest_Name){
        $tour      = Web::find(config('app.web'))->tour()->where(['status'=>1,'slug'=>$dest_Name])->orderBy('id', 'DESC')->first();                
        $dataip    = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
        $data      = $dataip['geoplugin_request'];
        $today     = date('Y-m-d 00:00:00');
        // $yesterday = date('Y-m-d 00:00:00',strtotime(date($dt). "+1 days"));      
        if ($tour) {
              if ( !CountView::Getdate($today, $data , $tour->id)) {
                        $adds                 = new CountView;
                        $adds->ip             = $dataip['geoplugin_request'];
                        $adds->cityName       = $dataip['geoplugin_city'];
                        $adds->countryName    = $dataip['geoplugin_countryName'];
                        $adds->timezone       = $dataip['geoplugin_timezone'];
                        $adds->tour_id        = $tour->id;
                        $adds->web_id         = 1;
                        $adds->save();   
                    }
                return view('destination.singleView', compact('tour'));
        }
        return view('errors.404');        
    }




    // public function getGolfPackage(Request $req) {
    //         $get_con = Country::where('country_slug', $req->by)->first();
    //  if (isset($req->by)) {            
    //      $golfpackage = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 2])->orderByRaw("RAND()")->take(6)->get();
    //         $golfCourse = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 1])->orderByRaw("RAND()")->take(6)->get();
    //      $active = $get_con->id;
    //  }else{
    //      $active = '';
    //      $golfpackage = GolfPackage::where('type', 2)->orderBy('id', 'DESC')->orderByRaw("RAND()")->take(6)->get();
    //         $golfCourse = GolfPackage::where('type', 1)->orderBy('id', 'DESC')->orderByRaw("RAND()")->take(6)->get();
    //  }
    //     // return $get_con;
    //  return view('destination.destination', compact('golfpackage', 'golfCourse', 'get_con','active'));
    // }

    // public function getGolfCourse($country){
    //     $get_con = Country::where('country_slug', $country)->first();
    //     $golfpackage = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 2])->orderByRaw("RAND()")->take(6)->get();
    //     $golfCourse = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 1])->orderByRaw("RAND()")->take(6)->get();
    //     return view('destination.destination', compact('golfpackage', 'golfCourse', 'get_con'));
    // }

    // public function getGoflDetails($country, $province, $golfName){
    //     $golf = GolfPackage::where('golf_slug', $golfName)->first();
    //     return view("destination.singleView", compact('golf'));
    // }

    // // activities section making
    public function getActivity(){
        $ourNews =  Web::find(config('app.web'))->events()->where(['status'=>1])->orderBy('id', 'DESC')->paginate();
        return view('activity.activity', compact('ourNews'));
    }

    // view single view openssl_pkey_get_details(key)
    public function singActivity($New){
        $Onew = Events::where('slug', $New)->first();
        return view('activity.singActivity', compact('Onew'));
    }

    public function getpackage(){
        $package  =  Web::find(config('app.web'))->tour()->where(['status'=>1])->orderBy('id', 'DESC')->paginate(6);
        return view('activity.our_package', compact('package'));
    }


    // // for request tee time()
    // public function getRequestTeeTime(Request $req){
    //     $data = ['date' => $req->date,
    //             'teetime' => $req->teetime,
    //             'phone' => $req->phone,
    //             'email' => $req->email, 
    //             'player' => $req->player,
    //             'link' => $req->link,
    //             'message' => $req->message ];
    //     Mail::to(config('app.email'))->send(new RequestTeeTime($data));
    //     return back()->with('message' , 'Tees Time Request Successfully');
    // }

    // // for contact us anytime
    public function getContactUs(){
        return view('contact.contactUs');
    }

    // for contact sent message
    
    public function sendContact(Request $req){

        //     'g-recaptcha-response' => 'required|captcha'


        $data = ['date'=>$req->date,
                 'pax'=>$req->pax_number,
                 'url' => $req->url, 
                 'title'=> $req->title,
                 'phone'=> $req->phone, 
                 'email'=> $req->email, 
                 'message'=> $req->message
             ];
        Mail::to(config('app.email'))->send(new ContactUs($data));
        return back()->with('message' , 'Your request booking has been submitted we will contact you back in shortly..! Thanks you.'); 

}

}
