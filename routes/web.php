<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

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
