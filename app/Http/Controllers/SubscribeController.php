<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;
use Validator;
use App\CountView;

use Illuminate\Support\Facades\Mail;
use \App\Mail\RequestTeeTime;
use \App\Mail\Requesttravel;

class SubscribeController extends Controller
{


     public function subscribe(Request $req){
        $dataip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

        // return view('login.loginform');

        $validate = Validator::make($req->all(), [
            'subscribe' => 'required',
            'email'     => 'required'
        ]);

        if (!$validate->fails()) {
           if (!Subscribe::Email($req->email,'subscriber') ) {
                $adds = new Subscribe;
           
                $adds->subscribeEmail = $req->email;
                $adds->type           = 'subscriber';
                $adds->status         = 1;
                $adds->ip             = $dataip['geoplugin_request'];
                $adds->cityName       = $dataip['geoplugin_city'];
                $adds->countryName    = $dataip['geoplugin_countryName'];
                $adds->timezone       = $dataip['geoplugin_timezone'];
        
                $adds->save();
                return back()->with(['message' => 'Subscribe Success']);
            }
            else{
                return back()->with(['message' => 'Your email already exits', 'status' => 0])->withInput($req->all());   
            }
        }

        else{
            return back()->withErrors($validate)->withInput();
        }
    }


     public function getemail($myid){

               $dec=decrypt($myid);
              $edit = Subscribe::find($dec);
             
             return view('unsubscribe', compact('edit'));

    }

     public function getsubcribe(){       
    	$emailusers = Subscribe::orderBy('id', 'desc')->get();
    	return view('admin.subscribe.subscribe', compact('emailusers'));
    }


    public function unsubscribe(Request $req){
        $evalidate  = Validator::make($req->all(), [
            'email' => 'required',
            'id'    =>'required'
        ]);
        
        $data= decrypt( $req->id);

        if (!$evalidate->fails()) {

            $edit = Subscribe::find($data);
            $edit->status = 0;
            $edit->save();

                        return redirect('/');
                    }else{
                        return back()->withErrors($evalidate)->withInput();
                    }

                }

    


    public function requesttraveling(Request $req){

        // return $req->t_id;

         $dataip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

        $validate = Validator::make($req->all(), [
            'email' =>  'required',
            'phone' =>  'required'
        ]);
        $date=date("Y-m-d '00':'00':'00'");

        if (!$validate->fails()) {
           if (!Subscribe::Requstt($req->email,'requesttraveling',$date) ){
                $adds = new Subscribe;
           
                $adds->subscribeEmail = $req->email;
                $adds->type           = 'requesttraveling';
                $adds->status         = 1;
                $adds->phone          = $req->phone;
                $adds->ip             = $dataip['geoplugin_request'];
                $adds->cityName       = $dataip['geoplugin_city'];
                $adds->countryName    = $dataip['geoplugin_countryName'];
                $adds->timezone       = $dataip['geoplugin_timezone'];
                $adds->tour_id        = $req->t_id;
                $adds->save();

                $data = array(
                    'email' =>$req->email , 
                    'date'  =>$req->date ,
                    'phone' =>$req->phone,
                    'pax'   =>$req->pax_number,
                    'text'  =>$req->message,
            );
                // return [$data,$date];

                Mail::to($req->email)->send(new Requesttravel($data));
                return back()->with(['message' => 'Request Traveling Success']);
            }
            else{
                return back()->with(['message' => 'Your email already exits', 'status' => 0])->withInput($req->all());   
            }
        }

        else{
            return back()->withErrors($validate)->withInput();
        }
    }

  
        public function getcount(){  
          $data_countview = CountView::getcount_viewTours();
          $data_count     = CountView::getc();
          return view('admin.conutview.conutview', compact('data_count','data_countview'));
    }

        public function getcount_g_c(){  
          $data_countview = CountView::getcount_golf_c();
          $data_count     = CountView::getcount_golf_cours();
          return view('admin.conutview.count_ongolfcourses', compact('data_count','data_countview'));
    }
         public function getcount_h_r(){  
          $data_countview = CountView::getcount_hotel_r();
          $data_count     = CountView::getcount_hotel_resort();
          return view('admin.conutview.count_onhotel', compact('data_count','data_countview'));
    }
}