<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;
use Validator;
use Illuminate\Support\Facades\Response;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //
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
    public function store(Request $req)
    {
        // return $req->all();
        $dataip   = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));   
        $validate = Validator::make($req->all(), [ 'email' => 'required']);

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
                return Response::json([ 'show' =>'true', 
                                        'type' =>'success',
                                        'title'=>'success',
                                        'text' =>'Thank You for Subscribe'])->header("Access-Control-Allow-Origin",  "*");
            }
            else{
                return Response::json([ 'show' =>'true', 
                                        'type' =>'warning',
                                        'title'=>'Sorry',
                                        'text' =>'Your Email Already'])->header("Access-Control-Allow-Origin",  "*");

            }
        }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
