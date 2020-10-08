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


Route::get('/Clientes/listado', $route.'\Administration@View_Clients')->name('View_Clients');
Route::get('/Clientes/insertar', $route.'\Administration@Crear_Clientes')->name('Crear_Clientes');
Route::post('/Clientes/insertar', $route.'\Administration@Guardar_clientes')->name('Guardar_clientes');

#Rutas Listado estudiante, persona, asignacion estudiantes/curso
Route::get('/estudiantes/listado',$route.'\Administration@View_User_Student')->name('View_User_Student');
Route::get('/personas/listado',$route.'\Administration@View_User_Person')->name('View_User_Person');
Route::get('/asignacion/estudiantes',$route.'\Administration@View_Student_Assignment')->name('View_Student_Assignment');
Route::get('/permisos/listado',$route.'\Administration@View_Permission')->name('View_Permission');


Route::get('/Curso/listado', $route.'\Administration@View_Grade')->name('View_Grade');
Route::get('/Grado/listado', $route.'\Administration@View_Course')->name('View_Course');
Route::get('/Nivel/listado', $route.'\Administration@View_Level')->name('View_Level');
Route::get('/Clase/listado', $route.'\Administration@View_Classroom')->name('View_Classroom');
Route::get('/Menu/listado', $route.'\Administration@View_Menu')->name('View_Menu');
Route::get('/Rol/listado', $route.'\Administration@View_Rol')->name('View_Rol');


#Rutas CRUD Usuario Persona
Route::get('/datos', $route.'\Administration@View_User_Person')->name('View_User_Person');
Route::post('/insertar', $route.'\Administration@Create_User_Person')->name('Create_User_Person');
Route::get('/editar/{usuario}',[Administration::class, 'Edit_User_Person']);
Route::post('/actualizar/{id}',[Administration::class, 'Update_User_Person']);