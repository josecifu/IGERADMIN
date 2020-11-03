<?php

use Illuminate\Support\Facades\Route;

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
$route = "App\Http\Controllers";
#Login
Route::get('/login', $route.'\LoginController@index')->name('login');

Route::get('/', $route.'\Administration@Dashboard')->name('home')->middleware('auth');
#Signin
Route::post('/signin',  $route.'\LoginController@login')->name('signin');
#logout
Route::get('/logout', $route.'\LoginController@logout')->name('logout');

Route::group([ 'prefix' => 'administration','middleware' => 'auth'], function(){

	$route = "App\Http\Controllers";

	#Inicio
	Route::group([ 'prefix' => 'home'], function(){
		$route = "App\Http\Controllers";
		#Dashboad
		Route::get('/dashboard', $route.'\Administration@Dashboard')->name('Dashboard');
	});
	#Estudiantes
	Route::group([ 'prefix' => 'student'], function(){
		$route = "App\Http\Controllers";
		Route::get('/list',$route.'\Student@list')->name('listStudent');
		Route::get('/create',$route.'\Student@create')->name('CreateStudent');
		Route::post('/save', $route.'\Student@save')->name('SaveStudent');
		Route::get('/edit/{model}',$route.'\Student@edit')->name('EditTeacher');
		Route::post('/update', $route.'\Student@update')->name('UpdateTeacher');
		Route::get('/list/grade',$route.'\Student@list_grade')->name('ListGradeStudent');
		Route::get('/score',$route.'\Student@score')->name('ScoreStudent');
		Route::get('/logs',$route.'\Student@logs')->name('LogsStudent');
	});
	#Voluntarios
	Route::group([ 'prefix' => 'teacher'], function(){
		$route = "App\Http\Controllers";
		Route::get('/list',$route.'\Teacher@list')->name('ListTeacher');
		Route::get('/list/workspace',$route.'\Teacher@workspace')->name('WorkspaceTeacher');
		Route::get('/create',$route.'\Teacher@create')->name('CreateTeacher');
		Route::post('/save', $route.'\Teacher@save')->name('SaveTeacher');
		Route::get('/edit/{model}',$route.'\Teacher@edit')->name('EditTeacher');
		Route::post('/update', $route.'\Teacher@update')->name('UpdateTeacher');
		Route::get('/score',$route.'\Teacher@score')->name('ScoreTeacher');
		Route::get('/logs',$route.'\Teacher@logs')->name('LogsTeacher');
		Route::get('/delete/{model}', $route.'\Teacher@delete')->name('DeleteTeacher');
		Route::get('/delete/{model}', $route.'\Teacher@delete')->name('DeleteTeacher');
	Route::get('/search',$route.'\Teacher@formScore')->name('ScoreTeacher');
	Route::get('/workspace',$route.'\Teacher@workspace')->name('WorkspaceTeacher');
	});
	Route::group([ 'prefix' => 'configurations'], function(){
		$route = "App\Http\Controllers";
		Route::get('level/list',$route.'\Administration@LevelList')->name('LevelList');
		
	});
});

