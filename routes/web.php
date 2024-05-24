<?php

use App\Http\Controllers\activityChildernController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\developmentChildernController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\ReportStudent;
use App\Http\Controllers\TransDeveloperChildernController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\validateAssessmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/register', [AuthController::class, 'index']);
Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/re-registration/{id}', [AuthController::class, 're_registration']);
Route::post('/submitRegistration', [AuthController::class, 'submitRegistration']);
route::get('/data-list', [AuthController::class, 'getDataList'])->name('getDataList');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard-chart', [DashboardController::class, 'chartData'])->middleware('auth');


Route::resource('students', StudentController::class)->middleware('auth');
Route::get('/getDataListStudents', [StudentController::class, 'getData'])->name('getDataListStudents')->middleware('auth');
Route::get('/student/sentEmail/{id}', [StudentController::class, 'sentEmail'])->middleware('auth');
Route::get('/student/validateRegist/{id}', [StudentController::class, 'validateRegist'])->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::resource('teacher', teacherController::class)->middleware('auth')->except('update','create');
Route::post('/updateTeacher', [teacherController::class, 'update'])->name('updateTeacher')->middleware('auth');
Route::get('/getDataTeacher', [teacherController::class, 'getData'])->name('getDataTeacher')->middleware('auth');
Route::resource('DevelopmentChildern', developmentChildernController::class)->middleware('auth');
Route::post('/updateDevelopmentChildern', [developmentChildernController::class, 'update'])->name('updateDevelopmentChildern')->middleware('auth');
Route::get('/getDataDevelopmentChildern', [developmentChildernController::class, 'getData'])->name('getDataDevelopmentChildern')->middleware('auth');

Route::resource('activityChildern', activityChildernController::class)->middleware('auth');
Route::post('/updateActivity', [activityChildernController::class, 'update'])->name('updateActivity')->middleware('auth');
Route::get('/getDataActivity', [activityChildernController::class, 'getData'])->name('getDataActivity')->middleware('auth');

Route::resource('trans-DevelopmentChildern', TransDeveloperChildernController::class)->middleware('auth');
Route::get('/getData-trans-DevelopmentChildern', [TransDeveloperChildernController::class, 'getDataStudent'])->name('getDataStudent')->middleware('auth');
Route::get('/getData-assessment/{id}/{student}', [TransDeveloperChildernController::class, 'getDataAssessment'])->middleware('auth');
Route::post('/submitAssessment', [TransDeveloperChildernController::class, 'store'])->name('submitAssessment')->middleware('auth');

Route::get('/report', [reportController::class, 'index'])->name('indexReport');
Route::get('/report/teacher', [reportController::class, 'reportTeacher'])->name('reportTeacher');
Route::get('/report/getTeacher', [reportController::class, 'getTeacher'])->name('getReportTeacher');
Route::get('/report/getStudent', [reportController::class, 'getStudent'])->name('getReportStudent');
Route::get('/report/student', [reportController::class, 'reportStudent'])->name('reportStudent');
Route::post('/report/getReportAssessment', [reportController::class, 'getReportAssessment'])->name('getReportAssessment');

// ortu
Route::get('/reportStudent/assessment', [ReportStudent::class, 'index']);
Route::get('/reportStudent/Printassessment', [ReportStudent::class, 'reportStudent'])->name('Printassessment');

Route::resource('user', UserController::class);
Route::get('/getUser', [UserController::class, 'getData'])->name('getUser');

Route::resource('info', InfoController::class);
Route::post('/updateInfo', [InfoController::class, 'update'])->name('updateInfo');
Route::get('/getInfo', [InfoController::class, 'getData'])->name('getInfo');

Route::post('/profileStudent', [ProfileController::class, 'update']);
Route::PUT('/profileUser/{id}', [ProfileController::class, 'updateUser']);
Route::PUT('/profileTeacher/{id}', [ProfileController::class, 'updateTeacher']);


Route::get('/validate', [validateAssessmentController::class, 'index']);
Route::post('/submitValidate', [validateAssessmentController::class, 'validateAssessment']);


