<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\GolfPackage;
class GolfController extends Controller
{
    //
    public function getGolf(){
    	$golfPack = GolfPackage::orderBy('id', 'DESC')->get();
    	return view('admin.golf_packages.PackageList', compact('golfPack'));
    }

    public function getGolfForm(){
    	return view("admin.golf_packages.golfForm");
    }

    public function createGolf(Request $req){
    	try{
	    	if($req->hasFile('gallery')){
		    	$galleries = '';
		    	foreach ($req->gallery as $key => $tmpGallary) {
		            $gallery = time().'-'.$tmpGallary->getClientOriginalName();
		            $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
		            $gimg->save(public_path('photos/share/thumbs/'.$gallery));
		            $tmpGallary->move(public_path('photos/share/'), $gallery);
		            $galleries .= $gallery.',';
		    	}
		    }
		    if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 270);
	            $img->save(public_path('photos/share/thumbs/'.$filename));
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = "";
		    }
	    	$golf = new GolfPackage;
	    	$golf->golf_name = $req->golf_name;
	    	$golf->golf_slug = str_slug($req->golf_name, '-');
	    	$golf->country_id = $req->golf_country;
	    	$golf->province_id = $req->golf_province;
	    	$golf->type = $req->golf_type;
	    	$golf->highlight = $req->highlight;
	    	$golf->desc = $req->desc;
	    	$golf->include = $req->include;
	    	$golf->picture = $filename;
	    	$golf->gallery = $galleries;
	    	$golf->dayNight = $req->dayNight;
	    	$golf->price = $req->price;
	    	$golf->user_id = \Auth::user()->id;
	    	$golf->save();
			return back()->with('message', 'Publish Success');	    	
    	}catch (Exception $e) {
	   		return back()->with('message', 'Something went wrong please try again ');
	    }
    }	


    public function getGoflEdit($gid){
    	$golf = GolfPackage::Find($gid);
    	return view('admin.golf_packages.golfFormEdit', compact('golf'));
    }

    public function updateGolf(Request $req){
    		try{
	    	if($req->hasFile('gallery')){
		    	$galleries = '';
		    	foreach ($req->gallery as $key => $tmpGallary) {
		            $gallery = time().'-'.$tmpGallary->getClientOriginalName();
		            $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
		            $gimg->save(public_path('photos/share/thumbs/'.$gallery));
		            $tmpGallary->move(public_path('photos/share/'), $gallery);
		            $galleries .= $gallery.',';
		    	}
		    }else{
		    	$galleries = $req->old_gallery;
		    }
		    if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 270);
	            $img->save(public_path('photos/share/thumbs/'.$filename));
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = $req->old_image;
		    }
	    	$golf = GolfPackage::find($req->eid);
	    	$golf->golf_name = $req->golf_name;
	    	$golf->golf_slug = str_slug($req->golf_name, '-');
	    	$golf->country_id = $req->golf_country;
	    	$golf->province_id = $req->golf_province;
	    	$golf->type = $req->golf_type;
	    	$golf->highlight = $req->highlight;
	    	$golf->desc = $req->desc;
	    	$golf->include = $req->include;
	    	$golf->picture = $filename;
	    	$golf->gallery = $galleries;
	    	$golf->dayNight = $req->dayNight;
	    	$golf->price = $req->price;
	    	$golf->user_id = \Auth::user()->id;
	    	$golf->save();
			return back()->with('message', 'Update Success');	    	
    	}catch (Exception $e) {
	   		return back()->with('message', 'Something went wrong please try again ');
	    }
    }
}
