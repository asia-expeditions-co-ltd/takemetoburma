<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ourNew;
use App\GolfPackage;
use App\Province;
use App\Country;
use App\Slide;
use App\Tour;
use App\Events;
use App\Category;
use App\Subscribe;
use App\CountView;
class AdminController extends Controller
{
    //
    public function getDashboard(){
    	return view('admin.index');
    }

    // option delete all action
    public function deleteOption(Request $req){

    	if ($req->action == 'user') {
    		User::find($req->dataId)->delete();
    		return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
    	}elseif ($req->action == 'new') {
            ourNew::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'golf') {
            GolfPackage::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'country') {
            Country::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'slide') {
            Slide::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'tour'){
          $tour = Tour::find($req->dataId);
          $tour->status = 1;
          $tour->save();
          return response()->json(['message' => 'Your tour have been moved to trash', 'status' => 'yes']);
        }elseif ($req->action == 'tour-trash') {
          $tour = Tour::find($req->dataId);
          $tour->web()->detach();
          $tour->delete();
          return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'province') {
          Province::find($req->dataId)->delete();
          return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'event-trash') {
          $event = Events::find($req->dataId);
          $event->web()->detach();
          $event->delete();
            return response()->json(['message' => 'Your event have been moved from trash', 'status' => 'yes']);
        }elseif ($req->action == 'event') {
          $event = Events::find($req->dataId);
          $event->status = 0;
          $event->save();
          return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'cat') {
          $cat = Category::find($req->dataId);
          $cat->status = 0;
          $cat->save();
          return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }
        elseif ($req->action == 'datasub') {
          Subscribe::find($req->dataId)->delete();
          return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }

        //  elseif ($req->action == 'datacount') {
        //   CountView::find($req->dataId)->delete();
        //   return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        // }
    }

    // option get search data
    public function getSearch(Request $req){
        $data = [];
        if ($req->action == 'province') {
            foreach (Province::where('country_id', $req->dataId)->orderBy('province_name', 'ASC')->get() as $key => $pro) {
                $data[] = [
                    'id' => $pro->id,
                    'title' => $pro->province_name
                ];
            }
            return response()->json(['data' => $data, 'status' => 'yes']);
        }
    }

    public function statusChange(Request $req){
      if($req->btnStatus == 'Publish'){
        foreach ($req->checkall as $val) {
          $tour =Tour::find($val);
          $tour->status = 1;
          $tour->save();
        }
        $message = 'Your tour have been Published';
      }else {
        foreach ($req->checkall as $val) {
          $tour =Tour::find($val);
          $tour->status = 0;
          $tour->save();
        }
        $message = 'Your tour have been moved to trash';
      }
      return back()->with('message', $message);
    }

    public function statusChangeEvent(Request $req){
      if($req->btnStatus == 'Publish'){
        foreach ($req->checkall as $val) {
          $event = Events::find($val);
          $event->status = 1;
          $event->save();
        }
        $message = 'Your event have been Published';
      }else {
        foreach ($req->checkall as $val) {
          $event = Events::find($val);
          $event->status = 0;
          $event->save();
        }
        $message = 'Your event have been moved to trash';
      }
      return back()->with('message', $message);
    }

      public function delete_data(Request $req){
      if($req->btnStatus == 'Move to Delete'){
        foreach ($req->checkall as $val) {
       Subscribe::find($val)->delete();
        }
        $message = 'Your data have been Delete';
      }
       return back()->with('message', $message);
    }

        public function delete__counting(Request $req){
      if($req->btnStatus == 'Move to Delete'){
        foreach ($req->checkall as $val) {
       CountView::find($val)->delete();
        }
        $message = 'Your data have been Delete';
      }
       return back()->with('message', $message);
    }


}
