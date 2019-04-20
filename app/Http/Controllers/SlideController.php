<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Slide;
class SlideController extends Controller
{
    //
    public function getSlide(){
    	$slides = Slide::orderBy('id', 'DESC')->get();
    	return view('admin.slides.slideList', compact('slides'));
    }

    public function getSlideForm(Request $req){
        $slide = '';
        if ($req->id) {
            $slide = Slide::find($req->id);  
            $webid = '';
            foreach ($slide->web as $key => $value) {
                $webid .= $value->pivot->web_id.',';
            }  
        }        
        
    	return view('admin.slides.slideForm', compact('slide', 'webid'));
    }

    public function createSlide(Request $req){

    	if ($req->btnSave == 'Update') {
    		if ( $req->hasFile('slide') ) {
	            $image = $req->file('slide');
	            $filename = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(1600, 770);
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	           $filename = $req->old_image;
		    }
	    	$eslide =  Slide::find($req->id);
	    	$eslide->picture = $filename;
	    	$eslide->name = $req->title;
	    	$eslide->user_id = \Auth::user()->id;
	    	$eslide->save();
            $eslide->web()->sync($req->web, true);
	    	return back()->with('message', 'Update success');
    	}
    	if ( $req->hasFile('slide') ) {
            $image = $req->file('slide');
            $filename = time().'-'.$image->getClientOriginalName();
            $img = Image::make($image->getRealPath())->fit(1600, 770);
            $image->move(public_path('photos/share/'), $filename);   
        }else{
           $filename = "";
	    }
    	$slide =  new Slide;
    	$slide->picture = $filename;
    	$slide->name = $req->title;
    	$slide->user_id = \Auth::user()->id;
    	$slide->save();
        $slide->web()->sync($req->web, false);
    	return back()->with('message', 'publish success');
    	// $slide->

    }
}
