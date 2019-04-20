<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Events;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if( isset($req->sort) ) {
            $events = Events::where('status', 0)->orderBy('id', 'DESC')->get();
        }else {
            $events = Events::where('status', 1)->orderBy('id', 'DESC')->get();
        }
        return view('admin.events.eventsList', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.eventsForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try{
            if (isset($req->btnPublish)) {
                $status = 1;
                $action ='Publish Successfully';
            }else{
                $status = 0;
                $action ='Save to trash';
            }
        
            if($req->hasFile('gallery')){
                $picture = '';
                foreach ($req->gallery as $key => $tmpGallary) {
                    $gallery = time().'-'.$tmpGallary->getClientOriginalName();
                    $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
                    $gimg->save(public_path('photos/share/thumbs/'.$gallery));
                    $tmpGallary->move(public_path('photos/share/'), $gallery);
                    $picture .= $gallery.',';
                }
            }else{
                $picture = '';
            }

            if ( $req->hasFile('image') ) {
                $image = $req->file('image');
                $photo = time().'-'.$image->getClientOriginalName();
                $img = Image::make($image->getRealPath())->fit(400, 270);
                $img->save(public_path('photos/share/thumbs/'.$photo));
                $image->move(public_path('photos/share/'), $photo);
            }else{
                $photo ='';
            }
            $titleSlug = str_slug($req->title, '-');
            $addEvent = New Events;
            $addEvent->title = $req->title;
            $addEvent->slug = $titleSlug.'.html';
            $addEvent->user_id = \Auth::user()->id;
            $addEvent->picture = $picture;
            $addEvent->photo = $photo;
            $addEvent->country_id = $req->country;
            $addEvent->province_id = $req->province;
            $addEvent->description = $req->desc;
            $addEvent->status = $status;
            $addEvent->save();
            $addEvent->web()->sync($req->web, false);
            return back()->with('message', $action);
        }catch (Exception $e) {
            return back()->with('message', 'Something went wrong please try again ');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        $webid = '';
        foreach ($event->web as $val) {
            $webid .= $val->pivot->web_id.',';
        }
        return view('admin.events.eventFormEdit', compact('event', 'webid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        try{
            if (isset($req->btnPublish)) {
                $status = 1;
                $action ='Update Successfully';
            }else{
                $status = 0;
                $action ='UnPublished';
            }
            
            if($req->hasFile('gallery')){
                $picture = '';
                foreach ($req->gallery as $key => $tmpGallary) {
                    $gallery = time().'-'.$tmpGallary->getClientOriginalName();
                    $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
                    $gimg->save(public_path('photos/share/thumbs/'.$gallery));
                    $tmpGallary->move(public_path('photos/share/'), $gallery);
                    $picture .= $gallery.',';
                }
            }else{
                $picture = $req->old_picture;
            }
            if ( $req->hasFile('image') ) {
                $image = $req->file('image');
                $photo = time().'-'.$image->getClientOriginalName();
                $img = Image::make($image->getRealPath())->fit(400, 270);
                $img->save(public_path('photos/share/thumbs/'.$photo));
                $image->move(public_path('photos/share/'), $photo);
            }else{
                $photo = $req->old_photo;
            }
            $titleSlug = str_slug($req->title, '-');
            $addEvent = Events::find($req->id);
            $addEvent->title = $req->title;
            $addEvent->slug = $titleSlug.'.html';
            $addEvent->user_id = \Auth::user()->id;
            $addEvent->picture = $picture;
            $addEvent->photo = $photo;
            $addEvent->country_id = $req->country;
            $addEvent->province_id = $req->province;
            $addEvent->description = $req->desc;
            $addEvent->status = $status;
            $addEvent->save();
            $addEvent->web()->sync($req->web, true);
            return back()->with('message', $action);
        }catch (Exception $e) {
            return back()->with('message', 'Something went wrong please try again ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::find($id);
        $event->web()->detach();
        if ($event->delete()) {
            return back()->with('message', 'Delete Successfully');
        }
    }
}
