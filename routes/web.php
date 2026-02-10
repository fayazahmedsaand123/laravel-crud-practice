<?php

use App\Http\Controllers\ForeignController;
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

// ================================== Student ======================================== // 
Route::get('/student',[ForeignController::class,'studentInput'])->name('student')->middleware('checklogin');

Route::post('/student_form',[ForeignController::class,'student_form'])->name('student_form');

Route::get('/record_student',[ForeignController::class,'Student_Search'])->name('record_student')->middleware('checklogin');

Route::get('/view_student/{id}',[ForeignController::class,'View_Student'])->name('view_student')->middleware('checklogin');

Route::get('/update_student/{id}',[ForeignController::class,'Update_Student'])->name('update_student')->middleware('checklogin');

Route::post('/update_studentPost/{id}',[ForeignController::class,'Update_StudentPost'])->name('update_studentPost');

Route::get('/delete_student/{id}',[ForeignController::class,'Delete_Student'])->name('delete_student')->middleware('checklogin');

// =================================== Teacher =========================================== //
Route::get('/teacher',[ForeignController::class,'teacherInput'])->name('teacher')->middleware('checklogin');

Route::post('/teacher_Form',[ForeignController::class,'teacher_form'])->name('teacher_Form');

Route::get('/record_teacher',[ForeignController::class,'Teacher_Search'])->name('record_teacher')->middleware('checklogin');

Route::get('/view_teacher/{id}',[ForeignController::class,'View_Teacher'])->name('view_teacher')->middleware('checklogin');

Route::get('/update_teacher/{id}',[ForeignController::class,'Update_Teacher'])->name('update_teacher')->middleware('checklogin');;

Route::post('/update_teacher_post/{id}',[ForeignController::class,'Update_Teacher_Post'])->name('update_teacher_post');

Route::get('/delete_teacher/{id}',[ForeignController::class,'Delete_Teacher'])->name('delete_teacher')->middleware('checklogin');

// ================================== Subject =========================================== //
Route::get('/subject',[ForeignController::class,'Subject_Form'])->name('subject')->middleware('checklogin');

Route::post('/subject_add',[ForeignController::class,'Subject_Add'])->name('subject_add');

Route::get('/record_subject',[ForeignController::class,'Subject_Search'])->name('record_subject')->middleware('checklogin');

Route::get('/view_subject/{id}',[ForeignController::class,'View_Subject'])->name('view_subject')->middleware('checklogin');

Route::get('/update_subject/{id}',[ForeignController::class,'Update_Subject'])->name('update_subject')->middleware('checklogin');;

Route::post('/update_subject_post/{id}',[ForeignController::class,'Update_Subject_Post'])->name('update_subject_post');

Route::get('/delete_subject/{id}',[ForeignController::class,'Delete_Subject'])->name('delete_subject')->middleware('checklogin');

// ======================================== Country =========================================== //
Route::get('/country_add',[ForeignController::class,'Country_Form'])->name('country_add')->middleware('checklogin');;

Route::post('/country_input',[ForeignController::class,'Country_Add'])->name('country_input');

Route::get('/record_country',[ForeignController::class,'Country_Search'])->name('record_country')->middleware('checklogin');

Route::get('/view_country/{id}',[ForeignController::class,'View_Country'])->name('view_country')->middleware('checklogin');

Route::get('/update_country/{id}',[ForeignController::class,'Update_Country'])->name('update_country')->middleware('checklogin');

Route::post('/update_country_post/{id}',[ForeignController::class,'Update_Country_Post'])->name('update_country_post');

Route::get('/delete_country/{id}',[ForeignController::class,'Delete_Country'])->name('delete_country')->middleware('checklogin');

// ================================= Computer ========================================= // 
Route::get('/computer',[ForeignController::class,'Computer'])->name('computer')->middleware('checklogin');

Route::post('/computer_add',[ForeignController::class,'Computer_Add'])->name('computer_add');

Route::get('/record_computer',[ForeignController::class,'Computer_Search'])->name('record_computer')->middleware('checklogin');

Route::get('/view_computer/{id}',[ForeignController::class,'View_Computer'])->name('view_computer')->middleware('checklogin');

Route::get('/update_computer/{id}',[ForeignController::class,'Update_Computer'])->name('update_computer')->middleware('checklogin');

Route::post('/update_computer_post/{id}',[ForeignController::class,'Update_Computer_Post'])->name('update_computer_post');

Route::get('/delete_computer/{id}',[ForeignController::class,'Delete_Computer'])->name('delete_computer')->middleware('checklogin');

// =============================== Quiz MCQ's ========================================================== //
Route::get('/quiz',[ForeignController::class,'Quiz'])->name('quiz')->middleware('checklogin');

Route::get('/mcqs',[ForeignController::class,'MCQ'])->name('mcqs')->middleware('checklogin');

Route::post('/mcq/store',[ForeignController::class,'Store'])->name('mcq.store');

Route::get('/record_quiz',[ForeignController::class,'Record_Quiz'])->name('record_quiz')->middleware('checklogin');

Route::get('/record_quiz',[ForeignController::class,'Search_Quiz'])->name('record_quiz')->middleware('checklogin');

Route::get('/view_quiz/{id}',[ForeignController::class,'View_Quiz'])->name('view_quiz')->middleware('checklogin');

Route::get('/update_quiz/{id}',[ForeignController::class,'Update_Quiz'])->name('update_quiz')->middleware('checklogin');

Route::post('/update_quiz_post/{id}',[ForeignController::class,'Update_Quiz_Post'])->name('update_quiz_post');

Route::get('/delete_quiz/{id}',[ForeignController::class,'Delete_Quiz'])->name('delete_quiz')->middleware('checklogin');

// ============================== Calculator ==================================================== //
Route::get('/calculator',[ForeignController::class,'Calculator'])->name('calculator')->middleware('checklogin');

Route::post('/calculator/save',[ForeignController::class,'Calculator_Post'])->name('calculator.save');

Route::get('/history_calculator',[ForeignController::class,'History_Calculator'])->name('history_calculator')->middleware('checklogin');

// =================================== Calendar =========================================== //
Route::get('/calendar',[ForeignController::class,'Calendar'])->name('calendar')->middleware('checklogin');

// ===================================== Alphabet ======================================== //
Route::get('/alphabets', [ForeignController::class, 'index'])->name('alphabets')->middleware('checklogin');

Route::post('/alphabet_store', [ForeignController::class,'Store_Alphabet'])->name('alphabet_store');

Route::get('/record_alphabet',[ForeignController::class,'Record_Alphabet'])->name('record_alphabet')->middleware('checklogin');

Route::get('/delete_alphabet/{id}',[ForeignController::class,'Delete_Alphabet'])->name('delete_alphabet')->middleware('checklogin');


// ================================ Register & Login & Forget Password ================================== //
Route::get('/register',[ForeignController::class,'Register'])->name('register')->middleware('guestcheck');

Route::post('/register_input',[ForeignController::class,'Register_Input'])->name('register_input');

Route::get('/login',[ForeignController::class,'LoginInput'])->name('login')->middleware('guestcheck');

Route::post('/Login_Route',[ForeignController::class,'Login_Input'])->name('Login_Route');

Route::get('/logout',[ForeignController::class,'Logout'])->name('logout');

Route::get('/forget_password',[ForeignController::class,'Forget_Password'])->name('forget_password')->middleware('guestcheck');

Route::post('/forget_password_post',[ForeignController::class,'Forget_Password_Post'])->name('forget_password_post');

Route::get('/reset_password{id}',[ForeignController::class,'Reset_Password'])->name('reset_password')->middleware('guestcheck');

Route::post('/reset_password_post{id}',[ForeignController::class,'Reset_Password_Post'])->name('reset_password_post');

// ========================== Admin and User =======================================//
Route::get('/user',[ForeignController::class,'User'])->name('user');

Route::get('/post',[ForeignController::class,'Post'])->name('post');

Route::post('/post_add',[ForeignController::class,'Post_Add'])->name('post_add');

Route::post('/post_delete/{id}',[ForeignController::class,'Post_Delete'])->name('post_delete');

Route::post('/post_like/{id}',[ForeignController::class,'Post_like'])->name('post_like');

Route::post('/post_comment/{id}',[ForeignController::class,'Post_Comment'])->name('post_comment');

Route::post('/comment_delete/{id}',[ForeignController::class,'Comment_Delete'])->name('comment_delete');

Route::post('/comment_like/{id}',[ForeignController::class,'Comment_Like'])->name('comment_like');

// =============================== Profile ============================================ //
Route::get('/profile/{id}',[ForeignController::class,'Profile'])->name('profile');
