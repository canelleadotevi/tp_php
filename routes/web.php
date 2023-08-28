<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListController::class,'index'])->name('index');

Route::get('/profil-details/{id?}', [ListController::class,"show"])->name("details");

Route::get('/deletes/{id}',[ListController::class,'supprimer'])->name('delete');

Route::post('/profil-details/store', [ListController::class,"store"])->name('student'); 




Route::get('/modify/{id}',[ListController::class,'modifyForm'])->name('modify');


Route::post('/updateStudentInformation/{id}',[ListController::class,"update"])->name('updateStudentInformation');




Route::post('/activate/{id}',[ListController::class,'lineActivate'])->name('activate');

