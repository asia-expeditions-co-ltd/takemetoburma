<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\GolfPackage;
use App\component\Content;
class Productcollection extends Controller
{
    //
    public function index (){
    	// return $product = GolfPackage::all();
    	return Content::toArray(GolfPackage::all());

    }

    // get dada
    public function show (Request $req){
    	$product = GolfPackage::find($req->product);
    	return (new Content())->toArray($product);
    }
}
