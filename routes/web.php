<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 
//--------------------|||||-- front end section -----|||||||----------
// social network
Route::get('sitemap.xml', 	  function () {return view('sitemap');   });
Route::get('sitemapload.xml', function () { return view('sitemapload');  });
Route::get('login/facebook', 'SocialController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialController@handleProviderCallback');

Route::get('/', 'HomeController@getHome')->name('home');
Route::get('myanmar-tour-packages', 'HomeController@getDestination')->name('getDest');
Route::get('/myanmar-tour/{tour}', 'HomeController@getTour')->name('tourDetails');

Route::get('/contact-us', 'HomeController@getContactUs')->name('getContact');
Route::post('/sendcontact', 'HomeController@sendContact')->name('sendContact');

// Route::get('/golf-courses', 'HomeController@getGolfPackage')->name('destination');
// Route::get('/{country}/golf-courses', 'HomeController@getGolfCourse');
// Route::get('/{country}/{province}/{golfName}', 'HomeController@getGoflDetails')->name('golfDetails');
Route::get('our-activities', 'HomeController@getActivity')->name('getActivity');
Route::get('/activity/single/view/{new}', 'HomeController@singActivity')->name('singleActivity');
// Route::post('sent/requestteetime', 'HomeController@getRequestTeeTime')->name('sentTeeTime');
Route::get('our-package', 'HomeController@getpackage')->name('getpackage');


Route::get('login', 'UserController@getLogin')->name('getLogin');
Route::post('doLogin', 'UserController@doLogin')->name('doLogin');
Route::get('signout', 'UserController@signout')->name('signout');

Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
Route::get('/getemail/{myid}', 'SubscribeController@getemail');
Route::post('/unsubscribe', 'SubscribeController@unsubscribe')->name('unsubscribe');
Route::post('/requesttraveling', 'SubscribeController@requesttraveling')->name('reqtraveling');



// ------------End front End ---------------- ||||-----------------


// -------------------------Back End Section ----------------------||||

Route::group(['middleware'=> 'isAdmin'], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/', 'AdminController@getDashboard');
		Route::get('/user', 'UserController@getUser')->name('getUser');
		Route::get('/user/add/new', 'UserController@getUserForm')->name('getcreateUser');
		Route::post('/user/add/create', 'UserController@createUser')->name('createUser');
		Route::get('/user/edit/{id}', 'UserController@geteditUser');
		Route::post('user/update/user', 'UserController@updateUser')->name('updateUser');
		// option delete all
		Route::get('/delete', 'AdminController@deleteOption')->name('getDelete');
		Route::get('/searchData', 'AdminController@getSearch')->name('getSearch');
    	Route::post('statuschange', 'AdminController@statusChange')->name('statusChange');
    	Route::post('statuschangevent', 'AdminController@statusChangeEvent')->name('statusChangeEvent');

   
    	Route::post('/delet_datal', 'AdminController@delete_data')->name('delete_data');


		// Tour Program
		// Route::resource('/tours', 'TourController');
		Route::get('/tours', 'TourController@index')->name('tourList');
		Route::get('/tours/create', 'TourController@create')->name('tourCreate');
		Route::post('/tours/create/new', 'TourController@store')->name('tourCreateNew');
		Route::get('/tour/{tour}/edit', 'TourController@edit')->name('tourEdit');
		Route::post('/tour/update', 'TourController@update')->name('tourUpdate');

		Route::get('/category', 'CategoryController@index')->name('categoryList');
		Route::get('/category/add', 'CategoryController@create')->name('getcatForm');
		Route::post('/category/create', 'CategoryController@store')->name('catCreate');
		// enents
		Route::get('events', 'EventsController@index')->name('eventList');
		Route::get('event/create', 'EventsController@create')->name('createCreate');
		Route::post('event/create/new', 'EventsController@store')->name('createCreateNew');
		Route::get('event/{event}/edit', 'EventsController@edit')->name('eventEdit');
		Route::post('event/update', 'EventsController@update')->name('updateEvent');

		// golf destination
		Route::get('country', 'DestinationController@countryList')->name('countryList');
		Route::get('country/add/country', 'DestinationController@getCountry')->name('getCountry');
		Route::post('country/create/country', 'DestinationController@createCountry')->name('createCountry');
		Route::get("country/update/country/{id}", 'DestinationController@getCountryEdit')->name('getCountryEdit');
		Route::post('country/update/country', 'DestinationController@updateCountry')->name('updateCountry');

		Route::get('province', 'DestinationController@provinceList')->name('provinceList');
		Route::get('/province/create/add', 'DestinationController@createProvince')->name('createProvince');
		Route::post('/province/create/store', 'DestinationController@createProvinceStore')->name('createProvinceStore');
		Route::get('/province/update/province/{proivince}', 'DestinationController@updateProvince')->name('updateProvince');
		Route::post('/province/update/province/edit', 'DestinationController@editProvince')->name('editProvince');

		Route::get('slide', 'SlideController@getSlide')->name('getSlide');
		Route::get('slide/new/slide', 'SlideController@getSlideForm')->name('slideForm');
		Route::post('slide/create/slide', 'SlideController@createSlide')->name('createSlide');

		Route::get('logo', 'LogoController@getlogo')->name('getlogo');
		Route::get('logo/new/logo', 'LogoController@getlogoForm')->name('logoForm');
		Route::post('logo/create/logo', 'LogoController@createlogo')->name('createlogo');

		Route::get('/subscribeemail', 'SubscribeController@getsubcribe')->name('getsubcribe');
		Route::get('/delatesubscribe', 'SubscribeController@deletesubcribe')->name('deletesubcribe');
		Route::get('/count_view', 'SubscribeController@getcount')->name('getcount');

		Route::post('/delete_count', 'AdminController@delete__counting')->name('delete__counting');
	});
});

// --------------------------End Back End section -------------------|||
