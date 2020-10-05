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
//Route::get('/login', 'LoginController@index')->name('login');
#HOME
Route::get('/', $route.'\Administration@Dashboard')->name('Dashboard');

Route::get('/datos',[Administration::class, 'View_User_Person']);
Route::post('/insertar',[Administration::class, 'Create_User_Person']);
Route::get('/editar/{usuario}',[Administration::class, 'Edit_User_Person']);
Route::post('/actualizar/{id}',[Administration::class, 'Update_User_Person']);