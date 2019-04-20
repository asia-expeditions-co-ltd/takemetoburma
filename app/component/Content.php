<?php
namespace App\component;

/**
* 
*/
class Content
{
	
	public static $UrlBase = '/home3/asiagolf/public_html/takemetoburma';
	public static $webUrl = 'http://takemetoburma.com';

	public static function urlImage($fileName, $location ='/photos/share/thumbs/' ){
		if ( file_exists(public_path().$location.$fileName) ) {
            $image = ($fileName == '' ? '/img/noImage.jpg' : $location.$fileName);
        }else if ( file_exists(static::$UrlBase.$location.$fileName) ) {
            $image = ($fileName == '' ? '/img/noImage.jpg' : static::$webUrl.$location.$fileName);
        }else{
            $image = ($fileName == '' ? '/img/noImage.jpg' : static::$webUrl.$location.$fileName);
        }    
        return $image;
	}

	// how to be your 
	public function toArray($request){
		return [
			'title' => $request->golf_name,
			'dayNight' => $request->dayNight,
			'price' => $request->price,
			'hightlight' => $request->highlight,
			'include' => $request->include,
			'detail' => $request->desc,
		];
	}
}
