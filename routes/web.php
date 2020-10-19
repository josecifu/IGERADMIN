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
	Route::get('/registrar', $route.'\Administration@Create_Person')->name('Create_Person');
	Route::post('/guardar', $route.'\Administration@Save_Person')->name('Save_Person');
	Route::get('/registrar/usuario', $route.'\Administration@Create_User_Person')->name('Create_User_Person');
	Route::post('/guardar/usuario', $route.'\Administration@Save_User_Person')->name('Save_User_Person');

	Route::get('/permisos/listado',$route.'\Administration@View_Permission')->name('View_Permission');
	Route::get('/horarios/listado',$route.'\Administration@View_Schedule')->name('View_Schedule');

	Route::group([ 'prefix' => 'home'], function(){
		$route = "App\Http\Controllers";
		#Dashboad
		Route::get('/dashboard', $route.'\Administration@Dashboard')->name('Dashboard');
	});
	Route::group([ 'prefix' => 'estudiantes'], function(){
		$route = "App\Http\Controllers";
		Route::get('/Listado',$route.'\Administration@View_User_Student')->name('View_User_Student');
	});
	Route::group([ 'prefix' => 'voluntarios'], function(){
		$route = "App\Http\Controllers";
		Route::get('/ListadoEstudiantes',$route.'\Teacher@View_Assigned_Student')->name('View_Assigned_Student');
		Route::get('/listado',$route.'\Administration@View_User_teacher')->name('View_User_teacher');
		Route::get('/editar/{id}',$route.'\Administration@Edit_Teacher')->name('Edit_Teacher');
		Route::post('/actualizar/{id}',$route.'\Administration@Update_Person')->name('Update_Person');
	});
});
Route::get('/clientes', $route.'\Administration@View_Clients')->name('View_Clients');		

Route::get('/asignacion/estudiantes',$route.'\Administration@View_Student_Assignment')->name('View_Student_Assignment');

//Usuario
//Permiso
Route::get('/insertar/permiso', $route.'\Administration@Create_Permission')->name('Create_Permission');
Route::post('/guardar/permiso', $route.'\Administration@Save_Permission')->name('Save_Permission');
//Horario
Route::get('/insertar/horario', $route.'\Administration@Create_Schedule')->name('Create_Schedule');
Route::post('/guardar/horario', $route.'\Administration@Save_Schedule')->name('Save_Schedule');

//Rutas Edicion y Actualizacion =======
Route::get('/editar/persona/{id}',$route.'\Administration@Edit_Person')->name('Edit_Person');
Route::post('/actualizar/{id}',$route.'\Administration@Update_Person')->name('Update_Person');
Route::get('/editar/permiso/{id}',$route.'\Administration@Edit_Permission')->name('Edit_Permission');
Route::post('/actualizar/permiso/{id}',$route.'\Administration@Update_Permission')->name('Update_Permission');
Route::get('/editar/horario/{id}',$route.'\Administration@Edit_Schedule')->name('Edit_Schedule');
Route::post('/actualizar/horario/{id}',$route.'\Administration@Update_Schedule')->name('Update_Schedule');





Route::get('/Grado/listado', $route.'\Administration@View_Grade')->name('View_Grade');
Route::get('/Curso/listado', $route.'\Administration@View_Course')->name('View_Course');
Route::get('/Nivel/listado', $route.'\Administration@View_Level')->name('View_Level');
Route::get('/Clase/listado', $route.'\Administration@View_Classroom')->name('View_Classroom');
Route::get('/Rol/listado', $route.'\Administration@View_Rol')->name('View_Rol');
Route::get('/Rol/insertar', $route.'\Administration@Create_Rol')->name('Create_Rol');
Route::post('/Rol/insertar', $route.'\Administration@Store_Rol')->name('Store_Rol');

Route::get('/Menu/listado', $route.'\Administration@View_Menu')->name('View_Menu');
Route::get('/Menu/insertar', $route.'\Administration@Create_Menu')->name('Create_Menu');
Route::post('/Menu/insertar', $route.'\Administration@Store_Menu')->name('Store_Menu');







#Rutas CRUD Usuario Persona
Route::get('/datos', $route.'\Administration@View_User_Person')->name('View_User_Person');
Route::post('/insertar', $route.'\Administration@Create_User_Person')->name('Create_User_Person');
<<<<<<< HEAD
Route::get('/editar/{usuario}',[Administration::class, 'Edit_User_Person']);
Route::post('/actualizar/{id}',[Administration::class, 'Update_User_Person']);
=======
Route::get('/edicion/{usuario}',[Administration::class, 'Edit_User_Person']);
Route::post('/Actualizar/{id}',[Administration::class, 'Update_User_Person']);
>>>>>>> c658bb22846317ea5816ab2c9b9c4e7bf9d1a7b3
