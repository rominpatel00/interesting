<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserstypeController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ChartController;


use App\Models\Users;

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



Route::get('/', function () {
    // return view('welcome');
    return view('/auth/login');
});

Route::get('/login', function () {
    return view('/auth/login');
})->middleware('isLoggedIn');
Route::get('/register', function () {
    return view('/auth/register');
})->middleware('isLoggedIn');
Route::get('/recover-password', function () {
    return view('/auth/recoverpassword');
})->middleware('isLoggedIn');

// Route::get('/sites', function () {
//     return view('/pages/sites');
// });
Route::post('login-verify', [LoginController::class, 'verify'])->name('login-verify');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::resource('/login', LoginController::class);

Route::resource('/users', UsersController::class)->middleware('isLoggedIn');
Route::post('/users/store', [UsersController::class, 'store'])->middleware('isLoggedIn');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/users/update/{id}', [UsersController::class, 'update'])->middleware('isLoggedIn');
Route::get('/users/destroy/{id}', [UsersController::class, 'destroy'])->middleware('isLoggedIn');


Route::resource('/userstype', UserstypeController::class)->middleware('isLoggedIn');
Route::post('/userstype/store', [UserstypeController::class, 'store'])->middleware('isLoggedIn');
Route::get('/userstype/edit/{id}', [UserstypeController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/userstype/update/{id}', [UserstypeController::class, 'update'])->middleware('isLoggedIn');
Route::get('/userstype/destroy/{id}', [UserstypeController::class, 'destroy'])->middleware('isLoggedIn');

Route::resource('/transaction', transactionController::class)->middleware('isLoggedIn');
Route::post('/transaction/store', [transactionController::class, 'store'])->middleware('isLoggedIn');
Route::get('/transaction/edit/{id}', [transactionController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/transaction/update/{id}', [transactionController::class, 'update'])->middleware('isLoggedIn');
Route::get('/transaction/destroy/{id}', [transactionController::class, 'destroy'])->middleware('isLoggedIn');


Route::resource('/income', IncomeController::class)->middleware('isLoggedIn');
Route::post('/income/store', [IncomeController::class, 'store'])->middleware('isLoggedIn');
Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/income/update/{id}', [IncomeController::class, 'update'])->middleware('isLoggedIn');
Route::get('/income/destroy/{id}', [IncomeController::class, 'destroy'])->middleware('isLoggedIn');


Route::resource('/create-quiz', QuizController::class)->middleware('isLoggedIn');
Route::post('/create-quiz/store', [QuizController::class, 'store'])->middleware('isLoggedIn');
Route::get('/create-quiz/edit/{id}', [QuizController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/create-quiz/update/{id}', [QuizController::class, 'update'])->middleware('isLoggedIn');
Route::get('/create-quiz/destroy/{id}', [QuizController::class, 'destroy'])->middleware('isLoggedIn');


Route::resource('/result', ResultController::class)->middleware('isLoggedIn');
Route::post('/result/store', [ResultController::class, 'store'])->middleware('isLoggedIn');
Route::get('/result/edit/{id}', [ResultController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/result/update/{id}', [ResultController::class, 'update'])->middleware('isLoggedIn');
Route::get('/result/destroy/{id}', [ResultController::class, 'destroy'])->middleware('isLoggedIn');

Route::resource('/quiz', ExamController::class)->middleware('isLoggedIn');
Route::post('/quiz/store', [ExamController::class, 'store'])->middleware('isLoggedIn');
Route::get('/quiz/edit/{id}', [ExamController::class, 'edit'])->middleware('isLoggedIn');
Route::put('/quiz/update/{id}', [ExamController::class, 'update'])->middleware('isLoggedIn');
Route::get('/quiz/destroy/{id}', [ExamController::class, 'destroy'])->middleware('isLoggedIn');

Route::post('/charts/getdetails', [ChartController::class, 'getdetails'])->middleware('isLoggedIn');
Route::resource('/charts', ChartController::class)->middleware('isLoggedIn');