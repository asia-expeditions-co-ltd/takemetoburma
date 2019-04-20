<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Tour;
use App\Tag;
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $tours = Tour::where('status', 1)->orderBy('id', 'DESC')->get();
        if (isset($req->sort)) {
            $tours = Tour::where('status', 0)->orderBy('id', 'DESC')->get();
        }
        return view('admin.tour.TourList', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tour.tourForm');
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
                $action ='Saved To Trash';
            }
            $picture = '';
            $photo ='';
            if($req->hasFile('gallery')){
                foreach ($req->gallery as $key => $tmpGallary) {
                    $gallery = time().'-'.$tmpGallary->getClientOriginalName();
                    $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
                    $gimg->save(public_path('photos/share/thumbs/'.$gallery));
                    $tmpGallary->move(public_path('photos/share/'), $gallery);
                    $picture .= $gallery.',';
                }
            }
            if ( $req->hasFile('image') ) {
                $image = $req->file('image');
                $photo = time().'-'.$image->getClientOriginalName();
                $img = Image::make($image->getRealPath())->fit(400, 270);
                $img->save(public_path('photos/share/thumbs/'.$photo));
                $image->move(public_path('photos/share/'), $photo);
            }
            $titleSlug = str_slug($req->title, '-');
            $addTour = New Tour;
            $addTour->title = $req->title;
            $addTour->slug = $titleSlug.'.html';
            $addTour->photo = $photo;
            $addTour->user_id = \Auth::user()->id;
            $addTour->picture = $picture;
            $addTour->type = $req->tourtype;
            $addTour->country_id = $req->country;
            $addTour->province_id = $req->province;
            $addTour->tour_daynight = $req->dayNight;
            $addTour->tour_price = $req->price;
            $addTour->tour_remark = $req->include;
            $addTour->tour_desc = $req->desc;
            $addTour->tour_highlight = $req->highlight;
            $addTour->keyword = $req->keyword;
            $addTour->status = $status;
            $addTour->save();
            $addTour->web()->sync($req->web, false);
            $addTour->category()->sync($req->web, false);
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
        $webid ='';
        $categoryid ='';
        $tour = Tour::find($id);
        foreach ($tour->web as $key => $value) {
            $webid .= $value->pivot->web_id.',';
        }
        foreach ($tour->category as $key => $val) {
            $categoryid .= $val->pivot->category_id.',';
        }
        return view('admin.tour.tourFormEdit', compact('tour', 'webid', 'categoryid'));
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
                $action ='Saved To Trash';
            }
            $picture = '';
            $photo = $req->old_photo;
            if($req->hasFile('gallery')){
                foreach ($req->gallery as $key => $tmpGallary) {
                    $gallery = time().'-'.$tmpGallary->getClientOriginalName();
                    $gimg = Image::make($tmpGallary->getRealPath())->fit(400, 270);
                    $gimg->save(public_path('photos/share/thumbs/'.$gallery));
                    $tmpGallary->move(public_path('photos/share/'), $gallery);
                    $picture .= $gallery.',';
                }
            }else{
                $picture =$req->old_picture;
            }
            if ( $req->hasFile('image') ) {
                $image = $req->file('image');
                $photo = time().'-'.$image->getClientOriginalName();
                $img = Image::make($image->getRealPath())->fit(400, 270);
                $img->save(public_path('photos/share/thumbs/'.$photo));
                $image->move(public_path('photos/share/'), $photo);
            }
            $titleSlug = str_slug($req->title, '-');
            $addTour = Tour::find($req->id);
            $addTour->title = $req->title;
            $addTour->slug = $titleSlug.'.html';
            $addTour->photo = $photo;
            $addTour->user_id = \Auth::user()->id;
            $addTour->type = $req->tourtype;
            $addTour->picture = $picture;
            $addTour->country_id = $req->country;
            $addTour->province_id = $req->province;
            $addTour->tour_daynight = $req->dayNight;
            $addTour->tour_price = $req->price;
            $addTour->tour_remark = $req->include;
            $addTour->tour_desc = $req->desc;
            $addTour->tour_highlight = $req->highlight;
            $addTour->keyword = $req->keyword;
            $addTour->status = $status;
            $addTour->save();
            $addTour->web()->sync($req->web, true);
            $addTour->category()->sync($req->cat, true);
            \Session::flash('message', $action);
            return redirect()->route('tourList');
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
    public function destroy($tour)
    {
        $tour = Tour::find($tour);
        $tour->web()->detach();
        if ($tour->delete()) {
            return back()->with('message', 'Delete Successfully');
        }
    }
}
