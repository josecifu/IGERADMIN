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
Route::redirect('/', '/administration/home/dashboard');
Route::get('/', $route.'\Administration@Dashboard')->name('home')->middleware('auth');
#Signin
Route::post('/signin',  $route.'\LoginController@login')->name('signin');
#logout
Route::get('/logout', $route.'\LoginController@logout')->name('logout');

Route::group([ 'prefix' => 'administration','middleware' => 'auth'], function(){
	
	$route = "App\Http\Controllers";
	Route::get('/test/{model}', $route.'\Administration@test')->name('test');
	Route::get('/load/periods', $route.'\Administration@LoadPeriods')->name('LoadPeriods');
	Route::post('/load/levels', $route.'\Administration@LoadLevels')->name('LoadLevels');
	Route::post('/load/grades', $route.'\Administration@LoadGrades')->name('LoadGrades');
	Route::post('/load/courses', $route.'\Administration@LoadCourses')->name('LoadCourses');
	#Inicio
	Route::group([ 'prefix' => 'home'], function(){
		$route = "App\Http\Controllers";
		#Dashboad
		Route::get('/dashboard', $route.'\Administration@Dashboard')->name('Dashboard');
	});
	#Estudiantes
	Route::group([ 'prefix' => 'student'], function(){
		$route = "App\Http\Controllers";
		Route::get('/list',$route.'\Student@list')->name('ListStudent');
		Route::get('/create',$route.'\Student@create')->name('CreateStudent');
		Route::post('/save', $route.'\Student@save')->name('SaveStudent');
		Route::get('/edit/{model}',$route.'\Student@edit')->name('EditStudent');
		Route::post('/update', $route.'\Student@update')->name('UpdateStudent');
		Route::get('/lists/grade/{model}',$route.'\Student@list_grade')->name('ListGradeStudent');
		Route::get('/score/{model}',$route.'\Student@score')->name('ListScoreStudent');
		Route::get('/score/course/{model}',$route.'\Student@course_scores')->name('CourseScores');
		Route::get('/logs',$route.'\Student@logs')->name('LogsStudent');
		Route::get('/test/{model}',$route.'\Student@test')->name('TestStudent');
		Route::get('/lists/test/{model}',$route.'\Student@list_test')->name('ListTest');
		Route::get('/list/eliminated',$route.'\Student@eliminated_students')->name('ListEliminatedStudents');
		Route::get('/delete/{model}', $route.'\Student@delete')->name('DeleteStudent');
		Route::get('/statistics',$route.'\Student@statistics')->name('StudentStatistics');
		Route::get('/activate/{model}', $route.'\Student@activate')->name('ActivateStudent');
	});
	#Voluntarios
	Route::group([ 'prefix' => 'teacher'], function(){
		$route = "App\Http\Controllers";
		Route::get('/list',$route.'\Teacher@list')->name('ListTeacher');
		Route::get('/list/workspace',$route.'\Teacher@workspace')->name('workTeacher');
		Route::get('/create',$route.'\Teacher@create')->name('CreateTeacher');
		Route::post('/save', $route.'\Teacher@save')->name('SaveTeacher');
		Route::get('/edit/{model}',$route.'\Teacher@edit')->name('EditTeacher');
		Route::post('/update', $route.'\Teacher@update')->name('UpdateTeacher');
		Route::get('/score/{model}',$route.'\Teacher@score')->name('ScoreTeacher');
		Route::get('/logs',$route.'\Teacher@logs')->name('LogsTeacher');
		Route::get('/delete/{model}', $route.'\Teacher@delete')->name('DeleteTeacher');
		Route::get('/search',$route.'\Teacher@seach')->name('SceachTeacher');
		Route::get('/workspace',$route.'\Teacher@workspace')->name('WorkspaceTeacher');
		Route::get('/statistics',$route.'\Teacher@statistics')->name('Statistics');
		Route::post('/load/courses', $route.'\Teacher@LoadCourses')->name('LoadCoursesTeacher');
		Route::get('/desactive', $route.'\Teacher@Desactive')->name('Desactive');
		Route::get('/activate/{model}', $route.'\Teacher@Activate')->name('ActivateTeacher');
		Route::get('/test/{model}', $route.'\Teacher@TestTeacher')->name('TestTeacher');
		Route::get('/question/{model}/{no}', $route.'\Teacher@QuestionTest')->name('QuestionsTest');
		Route::get('/create/test/{model}', $route.'\Teacher@createExam')->name('createExam');
		Route::get('/assign/question/test/{model}/{no}', $route.'\Teacher@AssignQuestion')->name('AssignQuestion');
		Route::post('/save/question/test', $route.'\Teacher@SaveAssignQuestion')->name('SaveAssignQuestion');
		Route::post('/save/test', $route.'\Teacher@saveExam')->name('saveExam');
	});
	//Comentario
	Route::group([ 'prefix' => 'configurations'], function(){
		$route = "App\Http\Controllers";
		Route::get('level/list',$route.'\Administration@LevelList')->name('LevelList');
		Route::get('level/list/deletes',$route.'\Administration@LevelListDelete')->name('LevelListDelete');
		Route::get('level/list/change/{id}/{type}',$route.'\Administration@ChangePeriod')->name('ChangePeriod');
		Route::get('level/list/grades/level/{id}',$route.'\Administration@ViewGradesLvl')->name('ViewGradesLvl');
		Route::post('level/save', $route.'\Administration@LevelSave')->name('LevelSave');
		Route::post('level/list/grades/courses/save',$route.'\Administration@SaveCourses')->name('SaveCourses');
		Route::post('period/save', $route.'\Administration@PeriodSave')->name('PeriodSave');
		Route::post('period/update', $route.'\Administration@PeriodUpdate')->name('PeriodUpdate');
		Route::post('period/grades/add', $route.'\Administration@GradesPeriod')->name('GradesPeriod');
	});
});

