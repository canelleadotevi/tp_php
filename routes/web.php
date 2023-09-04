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
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Cours_EnseignantController;
use App\Http\Controllers\EnseignantController;

Route::controller(ListController::class)->middleware('auth')->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/profil-details/{id?}', 'show')->name("details");

    Route::post('/profil-details/store', 'store')->name('student');

    Route::get('/modify/{id}', 'modifyForm')->name('modify');

    Route::get('/deletes/{id}', 'supprimer')->name('delete');

    Route::post('/updateStudentInformation/{id}', 'update')->name('updateStudentInformation');

    Route::post('/activate/{id}', 'lineActivate')->name('activate');

    Route::get('/management', 'management')->name('managementOfCourse');

    Route::get('teacher','teacher')->name('viewTeacher');
});



Route::controller(UserController::class)->prefix('user')->group(function () {

    Route::get('/user_login', "login")->name('login');

    Route::get('/user_register', "register")->name('register');

    Route::post('/registerStore', 'registerStore')->name('registerStore');

    Route::post('/loginStore', 'loginStore')->name('loginStore');

    Route::get('/verify_email/{email}', 'verify')->name('verifyEmail');

    Route::get('/forgotPassword', 'forgotPassword')->name('forgotPassword');

    Route::post('/formPasswordStore', 'formPasswordStore')->name('formPasswordStore');

    Route::get('/urlRoot/{email}', 'urlRoot')->name('urlRoot');

    Route::post('/reinitializeStore', 'reinitializeStore')->name('reinitializeStore');

    Route::post('/authentification', 'authentification')->name('authentification');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(CourseController::class)->group(function () {

    Route::get('/addCourse/{id?}', 'addCourse')->name('addCourse');

    Route::post('/courseStore', 'courseStore')->name('courseStore');

    Route::get('/addCategory', 'addCategory')->name('addCategory');

    Route::post('/categoryStore', 'categoryStore')->name('categoryStore');

    Route::get('/courseModify/{id}','courseModifyForm')->name('modifyCourseForm');

    Route::post('/courseUpdate/{id}','courseUpdateStore')->name('courseUpdate');

    Route::get('/courseDelete/{id}','deleteCourse')->name('deleteCourse');

});


Route::controller(EnseignantController::class)->group(function(){


    Route::get('/addTeacher/{id?}','addTeacher')->name('addTeacher');

    Route::post('/addteacherStore','store')->name('teacherStore');

    Route::get('/teacherModify/{id}','teacherModifyForm')->name('modifyTeacherForm');

    Route::post('/teacherUpdate/{id}','teacherUpdateStore')->name('teacherUpdate');

    Route::get('/teacherDelete/{id}','deleteTeacher')->name('teacherDelete');

    Route::get('/affectCourse/{id}','affectCourse')->name('affect');

    Route::post('/affectCourseToTeacher','createAffectation')->name('affectCourseToTeacher');


});
Route::controller(Cours_EnseignantController::class)->group(function(){

    Route::post('/affectCourseToTeacher','createAffectation')->name('affectCourseToTeacher');

    


});