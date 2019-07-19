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
use Equivalencias\Career;

Route::get('/', function () {
	return view('auth.login');
});
Route::get('/Verifi',['as'=>'verifi','uses'=>'verifiController@index']);
Route::get('/register/verify/{code}','verifiController@verify');
Auth::routes();

Route::group(['middleware'=>['verifiUser']],function(){

	Route::get('/Profile',['as'=>'profile-index','uses'=>'UsersController@profile']);
	Route::get('/Profile/upDate',['as'=>'profile.upData', 'uses'=>'ProfileController@update'] );

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/Area/{id}','AreaController@show');
//Admin
	Route::group(['middleware'=>['authen','rol'],'rol'=>['0']],function(){

		Route::apiResource('/University','UniversityController',['only'=>['index','store','update']]);
		Route::get('/University/Destroy/{slug}',['as'=>'University.destroy','uses'=>'UniversityController@delete']);

		Route::apiresource('/Areas','AreaController',['only'=>['index','store','update']]);
		Route::get('/Areas/Destroy/{slug}',['as'=>'Areas.destroy','uses'=>'AreaController@delete']);

		Route::apiresource('/Careers','CareerController',['only'=>['index','store','update']]);
		Route::get('/Careers/Destroy/{slug}',['as'=>'Careers.destroy','uses'=>'CareerController@delete']);

		Route::apiResource('/Matters','MatterController',['only'=>['index','store','update']]);
		Route::get('/Matters/Destroy/{slug}',['as'=>'Matters.destroy','uses'=>'MatterController@delete']);

		Route::apiResource('/Contents','ContentController',['only'=>['index','store','update']]);
		Route::get('/Contents/Destroy/{slug}',['as'=>'Contents.destroy','uses'=>'ContentController@delete']);

		Route::apiResource('/Users','UsersController',['only'=>['index','store','update','destroy']]);
	});
//Profesores
	Route::group(['middleware'=>['authen','rol'],'rol'=>['1']],function(){
		Route::group(['middleware'=>['matter_user']],function(){
			Route::apiResource('/Content','MatterController',['only'=>['index','store','update']]);
			Route::get('/Matters/Destroy/{slug}',['as'=>'Matters.destroy','uses'=>'MatterController@delete']);

			Route::apiResource('/Matter','MatterController',['only'=>['index','store','update']]);
			Route::get('/Matter/Destroy/{slug}',['as'=>'Matter.destroy','uses'=>'MatterController@destroy']);

			Route::apiResource('/MatterUser','MatterUserController',['only'=>['index','update']]);
		});
			Route::apiResource('/MatterUser','MatterUserController',['only'=>['store']]);
			Route::get('/Area/Show/{id}',['as'=>'Area.show','uses'=>'AreaController@show']);
			Route::get('/Career/Show/{id}',['as'=>'Career.show','uses'=>'CareerController@show']);
			Route::get('/Matter/Show/{id}',['as'=>'Matter.show','uses'=>'MatterController@showTwo']);

	});
//Estudiasnte 
	Route::group(['middleware'=>['authen','rol'],'rol'=>['2']],function(){
		Route::get('/Download/{slug}',['as'=>'Download.index','uses'=>'DownloadController@index']);

	});
});