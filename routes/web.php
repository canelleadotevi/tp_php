<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControlleur;
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
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;

Route::controller(ListController::class)->middleware('auth')->group(function(){

    Route::get('/')->name('index');

    Route::get('/profil-details/{id?}')->name("details");
    
    Route::post('/profil-details/store')->name('student'); 

});



Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('/user_login',"login")->name('login');

Route::get('/user_register',"register")->name('register');

Route::post('/registerStore','registerStore')->name('registerStore');

Route::post('/loginStore','loginStore')->name('loginStore');

Route::get('/verify_email/{email}','verify')->name('verifyEmail');

   
});
Route::get('/modify/{id}',[UserController::class,'modifyForm'])->name('modify');

Route::get('/deletes/{id}',[UserController::class,'supprimer'])->name('delete');

Route::post('/updateStudentInformation/{id}',[UserController::class,'update'])->name('updateStudentInformation');

Route::post('/activate/{id}',[UserController::class,'lineActivate'])->name('activate');












