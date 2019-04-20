<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ourNew;

use Intervention\Image\ImageManagerStatic as Image;
class OurNewsController extends Controller
{
    //P

    public function getOurNew(){
    	$ournew = ourNew::orderBy('id','DESC')->get();
    	return view('admin.our_new.newList', compact('ournew'));
    }

    public function getForm(){
    	return view('admin.our_new.newsForm');
    }

    public function createNew(Request $req){
    	try{
	    	if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 260);
	            $img->save(public_path('photos/share/thumbs/'.$filename));
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = "";
	        }
	    	$new = new ourNew;
	    	$title_slug = str_slug($req->title, '-');
	    	$new->tittle = $req->title;
	    	$new->slug = $title_slug.'.html';
	    	$new->description = $req->intro;
	    	$new->user_id = \Auth::user()->id;
	    	$new->picture = $filename;
	    	$new->category_id = $req->category;
	    	$new->save();
	    	return back()->with('message', 'Publish Success');	   
	   	}catch (Exception $e) {
	   		return back()->with('message', 'Something went wrong please try again ');
	    }
    }

    public function getUpdateNew($eid){
    	$new = ourNew::find($eid);
    	return view('admin.our_new.newsFormedit', compact('new'));
    }

     public function UpdateNew (Request $req){
    	try{
	    	if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 260);
	            $img->save(public_path('photos/share/thumbs/'.$filename));         
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = $req->old_image;
	        }
	    	$new = ourNew::find($req->Nid);
	    	$title_slug = str_slug($req->title, '-');
	    	$new->tittle = $req->title;
	    	$new->slug = $title_slug.'.html';
	    	$new->description = $req->intro;
	    	$new->user_id = \Auth::user()->id;
	    	$new->picture = $filename;
	    	$new->category_id = $req->category;
	    	$new->save();
	    	return back()->with('message', 'Update Success');	   
	   	}catch (Exception $e) {
	   		return back()->with('message', 'Something went wrong please try again ');
	    }
    }



}
