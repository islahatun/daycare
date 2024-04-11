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
use App\Http\Controllers\reportController;
use App\Http\Controllers\TransDeveloperChildernController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/register', function () {
    return view('Home.register');
});
Route::post('/registration', [AuthController::class, 'registration']);
route::get('/data-list', [AuthController::class, 'getDataList'])->name('getDataList');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('students', StudentController::class);
Route::get('/getDataListStudents', [StudentController::class, 'getData'])->name('getDataListStudents');
Route::get('/student/sentEmail/{id}',[StudentController::class,'sentEmail']);
Route::resource('profile',ProfileController::class);
Route::resource('teacher',teacherController::class);
Route::get('/getDataTeacher',[teacherController::class,'getData'])->name('getDataTeacher');
Route::resource('DevelopmentChildern', developmentChildernController::class);
Route::get('/getDataDevelopmentChildern',[developmentChildernController::class,'getData'])->name('getDataDevelopmentChildern');

Route::resource('activityChildern',activityChildernController::class);
Route::get('/getDataActivity', [activityChildernController::class, 'getData'])->name('getDataActivity');

Route::resource('trans-DevelopmentChildern',TransDeveloperChildernController::class);
Route::get('/trans-DevelopmentChildern/getData', [TransDeveloperChildernController::class, 'getData'])->name('getDataAssessment');

Route::get('/report',[reportController::class,'index'])->name('indexReport');
Route::get('/report/teacher',[reportController::class,'reportTeacher'])->name('reportTeacher');
Route::get('/report/getStudent',[reportController::class,'getStudent'])->name('getReportStudent');
Route::get('/report/student',[reportController::class,'reportStudent'])->name('reportStudent');
