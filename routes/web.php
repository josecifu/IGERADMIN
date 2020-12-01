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
#Restore
Route::post('/restore/username', $route.'\LoginController@restore')->name('restorepassword');
Route::get('/restore/password/{model}', $route.'\LoginController@restorepass')->name('restorepass');
Route::post('/password/change', $route.'\LoginController@ChangePassword')->name('ChangePassword');
#Dashboard
Route::redirect('/', '/administration/home/dashboard');
Route::get('/', $route.'\Administration@Dashboard')->name('home')->middleware('auth');
#Signin
Route::post('/signin',  $route.'\LoginController@login')->name('signin');
#logout
Route::get('/logout', $route.'\LoginController@logout')->name('logout');
Route::group([ 'prefix' => 'student','middleware' => 'auth'], function(){
	$route = "App\Http\Controllers";
	Route::get('/home/dashboard',$route.'\Student@dashboard')->name('StudentDashboard');
	Route::get('/home/workspace',$route.'\Student@workspace')->name('StudentWorkspace');
	Route::get('/test/list',$route.'\Student@all_tests')->name('StudentAllTest');
	Route::get('/test/view',$route.'\Student@student_test_list')->name('TestStudentView');
	Route::get('/test/view/questions/{model}',$route.'\Student@test_questions')->name('TestQuestions');
	Route::get('/score/list',$route.'\Student@score_list')->name('ScoreList');
	Route::post('/test/view/answers/save', $route.'\Student@save_answer')->name('SaveAnswer');
	Route::get('/course/list',$route.'\Student@teacher_information')->name('StudentCourseList');
	Route::get('/test_review/{model}/{assign}',$route.'\Student@test_review')->name('ViewTestStudent');
	Route::get('/profile/edit/{model}',$route.'\Student@edit_profile')->name('EditProfileStudent');
	Route::post('/profile/update', $route.'\Student@update_profile')->name('UpdateProfileStudent');
	
});
Route::group([ 'prefix' => 'teacher','middleware' => 'auth'], function(){									// =======================================
	$route = "App\Http\Controllers";
	Route::get('/home/dashboard',$route.'\Teacher@dashboard')->name('TeacherDashboard') ;
	Route::get('/home/workspace',$route.'\Teacher@workspaceT')->name('Teacherworkspace');
	Route::get('/score/list/{model}',$route.'\Teacher@score')->name('TeacherScore');
	Route::get('/test/view/{model}',$route.'\Teacher@ViewTestsGeplande')->name('TeacherViewTestsGeplande');
	Route::get('/test/list/{model}',$route.'\Teacher@TestTeacher')->name('TeacherTests');
	Route::get('/create/test/{model}',$route.'\Teacher@createExam')->name('TeacherCreateTest');
	Route::get('/assign/question/test/{exam}/{model}',$route.'\Teacher@AssignQuestion')->name('TeacherAssignQuestions');
	Route::get('/question/{model}/{no}', $route.'\Teacher@QuestionTest')->name('TeacherQuestionsTest');
	Route::get('/detail/activity/{curso}/{model}',$route.'\Teacher@DetailActivity')->name('TeacherdetailActivity');
	Route::get('/load/courses', $route.'\Teacher@TeacherLoadCourse')->name('TeacherLoadCourse');
	Route::post('/save/activity/{model}', $route.'\Teacher@saveActivity')->name('TeachersaveActivity');
	Route::get('/delete/activity/{curso}/{model}', $route.'\Teacher@deleteActivity')->name('TeacherdeleteActivity');
	Route::post('/update/activity', $route.'\Teacher@updateActivity')->name('TeacherupdateActivity');
	Route::post('/save/question/test', $route.'\Teacher@SaveAssignQuestion')->name('TeacherSaveAssignQuestion');
	Route::get('/view/qualify/test/{model}/{test}', $route.'\Teacher@QualifyTest')->name('TeacherViewQualify');
	Route::post('/qualify/question', $route.'\Teacher@SaveQualifyTest')->name('TeacherSaveQualify');
	Route::get('/view/pre-qualify/test', $route.'\Teacher@Pre-QualifyTest')->name('TeacherViewPreQualify');
	Route::get('/send/state/test/{model}', $route.'\Teacher@SendQualify')->name('TeacherSendQualify');
	Route::get('/test/score/{model}', $route.'\Teacher@TestScore')->name('TestScore');
	Route::post('/save/test', $route.'\Teacher@saveExam')->name('TeachersaveExam');
});
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
		Route::get('/report', $route.'\Administration@Report')->name('Report');
	});
	
	#Estudiantes
	Route::group([ 'prefix' => 'student'], function(){
		$route = "App\Http\Controllers";
		Route::get('/list',$route.'\Student@list')->name('ListStudent');
		Route::get('/create',$route.'\Student@create')->name('CreateStudent');
		Route::post('/save', $route.'\Student@save')->name('SaveStudent');
		Route::get('/edit/{model}',$route.'\Student@edit')->name('EditStudent');
		Route::post('/update', $route.'\Student@update')->name('UpdateStudent');
		Route::get('/list/bygrade/{model}',$route.'\Student@list_bygrade')->name('ListGradeStudent');
		Route::get('/score/{model}',$route.'\Student@score')->name('ListScoreStudent');
		Route::get('/score/course/{model}',$route.'\Student@course_scores')->name('CourseScores');
		Route::get('/logs',$route.'\Student@logs')->name('LogsStudent');
		Route::get('/test/{model}/{assign}',$route.'\Student@test')->name('TestStudent');
		Route::get('/list/test/{model}',$route.'\Student@test_list')->name('ListTestStudent');
		Route::get('/list/eliminated',$route.'\Student@eliminated_students')->name('ListEliminatedStudents');
		Route::get('/delete/{model}', $route.'\Student@delete')->name('DeleteStudent');
		Route::get('/activate/{model}', $route.'\Student@activate')->name('ActivateStudent');
		Route::get('/statistics',$route.'\Student@statistics')->name('StudentStatistics');
	});
	#Voluntarios
	Route::group([ 'prefix' => 'teacher'], function(){
		$route = "App\Http\Controllers";
		Route::get('/dashboard', $route.'\Teacher@Dashboard')->name('DashboardTeacher');
		Route::get('/list',$route.'\Teacher@list')->name('ListTeacher');
		Route::get('/list/workspace',$route.'\Teacher@workspace')->name('workTeacher');
		Route::get('/create',$route.'\Teacher@create')->name('CreateTeacher');
		Route::post('/save', $route.'\Teacher@save')->name('SaveTeacher');
		Route::get('/edit/{model}',$route.'\Teacher@edit')->name('EditTeacher');
		Route::get('/assign/courses/{model}',$route.'\Teacher@AdministrationCourses')->name('AdministrationCourses');
		Route::post('/save/assign/courses',$route.'\Teacher@SaveAdministrationCourses')->name('SaveAdministrationCourses');
		Route::post('/update', $route.'\Teacher@update')->name('UpdateTeacher');
		Route::get('/score/{model}',$route.'\Teacher@score')->name('ScoreTeacher');
		Route::get('/logs',$route.'\Teacher@logs')->name('LogsTeacher');
		Route::get('/delete/{model}', $route.'\Teacher@delete')->name('DeleteTeacher');
		Route::get('/search',$route.'\Teacher@seach')->name('SceachTeacher');
		Route::get('/workspace',$route.'\Teacher@workspace')->name('WorkspaceTeacher');
		Route::get('/statistics',$route.'\Teacher@statistics')->name('StatisticsTeacher');
		Route::post('/load/courses', $route.'\Teacher@LoadCourses')->name('LoadCoursesTeacher');
		Route::get('/desactive', $route.'\Teacher@Desactive')->name('Desactive');
		Route::get('/activate/{model}', $route.'\Teacher@Activate')->name('ActivateTeacher');
		Route::get('/test/{model}', $route.'\Teacher@TestTeacher')->name('TestTeacher');
		Route::get('/question/{model}/{no}', $route.'\Teacher@QuestionTest')->name('QuestionsTest');
		Route::get('/create/test/{model}', $route.'\Teacher@createExam')->name('createExam');
		Route::get('/assign/question/test/{model}/{no}', $route.'\Teacher@AssignQuestion')->name('AssignQuestion');
		Route::post('/save/question/test', $route.'\Teacher@SaveAssignQuestion')->name('SaveAssignQuestion');
		Route::post('/save/test', $route.'\Teacher@saveExam')->name('saveExam');
		Route::post('/save/activity/{model}', $route.'\Teacher@saveActivity')->name('saveActivity');
		Route::post('/update/activity', $route.'\Teacher@updateActivity')->name('updateActivity');
		Route::get('/delete/activity/{curso}/{model}', $route.'\Teacher@deleteActivity')->name('deleteActivity');
		Route::get('/detail/activity/{curso}/{model}', $route.'\Teacher@DetailActivity')->name('DetailActivity');
	});
	Route::group([ 'prefix' => 'workspace'], function(){
		$route = "App\Http\Controllers";
		Route::get('inscriptions',$route.'\Administration@Inscriptions')->name('Inscriptions');
		Route::get('list',$route.'\Administration@WorkspaceList')->name('WorkspaceList');
		Route::get('statistics',$route.'\Administration@Statistics')->name('Statistics');
		#Encargados de circulo
		Route::group([ 'prefix' => 'attendant'], function(){
			$route = "App\Http\Controllers";
			#Dashboad
			Route::get('/list', $route.'\Administration@AttendantList')->name('AttendantList');
		});
	});
	//Configuraciones
	Route::group([ 'prefix' => 'configurations'], function(){
		$route = "App\Http\Controllers";
		Route::get('list',$route.'\Administration@Configurations')->name('Configurations');
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

