<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Cast;
use App\PastCast;
use App\TestGallery;
use Illuminate\Http\Request;
/*
Route::get('/', function () {
    return view('welcome');
}); */


//Route::get('/', 'ListController@show');

/* the following are routes that are auto-generated when running php artisan make:auth */
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/form', 'HomeController@form');


/* Example of a route to a page that is only accessible when logged in using Auth Middleware */
Route::get('/got', [
  'middleware' => ['auth'],
  'uses' => function () {
   echo "You are allowed to view this page!";
}]);


/**
 * ROUTES FOR BUILDING THE CAST TABLE
 */
Route::post('/cast', function(Request $request){
	//
});

Route::delete('/cast/{id}', function(Request $request, $id){



	Cast::findOrFail($id)->delete();


	return redirect('/');
});

/**
 * Validation for the Cast Update form
 */
Route::post('/cast', function(Request $request){

	$validator = Validator::make($request->all(), [
		'actor' => 'required|max:255',
		'character_played' => 'required|max:255',
		]);

	if($validator->fails()){
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	// if valid, save and create/set properties for a new Eloquent model
	$cast = new Cast;
	$cast->actor = $request->actor;
	$cast->character_played = $request->character_played;
	$cast->save();

	return redirect('/');
});

/**
 * Getting Cast, displaying and sorting
 */

Route::get('/', function(){
	$casts = Cast::orderBy('created_at', 'asc')->get();

	return view('cast', [
		'casts' => $casts
		]);
});

/**
 * ROUTES FOR BUILDING THE PAST CAST TABLE
 */
Route::post('/past-cast', function(Request $request){
	//
});

Route::delete('/past-cast/{id}', function($id){
	PastCast::findOrFail($id)->delete();

	return redirect('/past-cast');
});

/**
 * Validation for the Past Cast Update form
 */
Route::post('/past-cast', function(Request $request){

	$validator = Validator::make($request->all(), [
		'actor' => 'required|max:255',
		'character_played' => 'required|max:255',
		'episode_deceased' => 'required|max:255',
		]);

	if($validator->fails()){
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	// if valid, save and create/set properties for a new Eloquent model
	$past_cast = new PastCast;
	$past_cast->actor = $request->actor;
	$past_cast->character_played = $request->character_played;
	$past_cast->episode_deceased = $request->episode_deceased;
	$past_cast->save();

	return redirect('/past-cast');
});

/**
 * Getting PAST cast, displaying and sorting
 */
Route::get('/past-cast', function(){
	$past_casts= PastCast::orderBy('actor', 'asc')->get();

	return view('past-cast', [
		'past_casts' => $past_casts
		]);
});


Route::post('/test-gallery', function($id){
	// if valid, save and create/set properties for a new Eloquent model
	$gallery_images = new GalleryImages;
	$gallery_images->name = $id->name;
	$gallery_images->pic = $id->pic;
	$gallery_images->save();
});
/**
 * Getting PAST cast, displaying and sorting
 */
Route::get('/test-gallery', function(){
	$gallery_images= GalleryImages::orderBy('name', 'asc')->get();

	return view('gallery_image', [
		'gallery_images' => $gallery_images
		]);
});


/**
 * Named route testing, remove later
 */
Route::get('/var-test', 'VariableController@show');

