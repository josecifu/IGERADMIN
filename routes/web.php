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
Route::get('/horarios/listado',$route.'\Administration@View_Schedule')->name('View_Schedule');

#Rutas Ingreso Personas, Usuarios, permisos, horarios
Route::get('/insertar/persona', $route.'\Administration@Create_Person')->name('Create_Person');
Route::post('/guardar/persona', $route.'\Administration@Save_Person')->name('Save_Person');
//Usuario
Route::get('/insertar/usuario', $route.'\Administration@Create_User_Person')->name('Create_User_Person');
Route::post('/guardar/usuario', $route.'\Administration@Save_User_Person')->name('Save_User_Person');
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

Route::get('/Curso/listado', $route.'\Administration@View_Grade')->name('View_Grade');
Route::get('/Grado/listado', $route.'\Administration@View_Course')->name('View_Course');
Route::get('/Nivel/listado', $route.'\Administration@View_Level')->name('View_Level');
Route::get('/Clase/listado', $route.'\Administration@View_Classroom')->name('View_Classroom');
Route::get('/Menu/listado', $route.'\Administration@View_Menu')->name('View_Menu');
Route::get('/Rol/listado', $route.'\Administration@View_Rol')->name('View_Rol');


#Rutas CRUD Usuario Persona
Route::get('/datos', $route.'\Administration@View_User_Person')->name('View_User_Person');
Route::post('/insertar', $route.'\Administration@Create_User_Person')->name('Create_User_Person');
Route::get('/edicion/{usuario}',[Administration::class, 'Edit_User_Person']);
Route::post('/Actualizar/{id}',[Administration::class, 'Update_User_Person']);