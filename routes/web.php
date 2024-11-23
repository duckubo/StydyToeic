<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ExaminationManageController;
use App\Http\Controllers\Admin\GrammarManageController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ListeningManageController;
use App\Http\Controllers\Admin\ReadingManageController;
use App\Http\Controllers\Admin\VocabularyManageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListeningController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route để hiển thị form đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Router login google
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Route để xử lý đăng ký
Route::post('/register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'formLogin'])->name('form_login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('check_user');

Route::get('profile/{id}', [AuthController::class, 'profile'])->name('profile');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::post('/resultlistening', [ListeningController::class, 'result'])->name('resultlistening');
Route::post('/resultreading', [ReadingController::class, 'result'])->name('resultreading');

Route::get('/vocabularyguideline', [VocabularyController::class, 'index'])->name('vocabularyguideline');
Route::get('/vocabularyguideline/{vocabularyguidelineid}', [VocabularyController::class, 'show'])->name('vocabularyguideline.show');

Route::get('/grammarguideline', [GrammarController::class, 'index'])->name('grammarguideline');
Route::get('/grammarguideline/{grammarguidelineid}', [GrammarController::class, 'show'])->name('grammarguideline.show');

Route::get('/listeningexercise', [ListeningController::class, 'index'])->name('listeningexercise');
Route::get('/listeningexercise/show', [ListeningController::class, 'show'])->name('listeningexercise.show');

Route::get('/readingexercise', [ReadingController::class, 'index'])->name('readingexercise');
Route::get('/readingexercise/show', [ReadingController::class, 'show'])->name('readingexercise.show');

Route::get('/examination', [ExaminationController::class, 'index'])->name('examination');
Route::get('/examination/show', [ExaminationController::class, 'show'])->name('examination.show');
Route::post('/examination', [ExaminationController::class, 'result'])->name('examination.result');

Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/account', [AccountController::class, 'index'])->name('admin.account');
// Danh sách bài hướng dẫn ngữ pháp
Route::get('/admin/grammarguideline', [GrammarManageController::class, 'index'])->name('admin.grammar');
Route::post('/admin/grammarguideline', [GrammarManageController::class, 'store'])->name('insert.grammarguideline');
Route::delete('/admin/grammarguideline/{grammarguidelineid}', [GrammarManageController::class, 'delete'])->name('delete.grammarguideline');
Route::get('/admin/grammarguideline/edit/{grammarguidelineid}', [GrammarManageController::class, 'edit'])->name('edit.grammarguidelinecontent');

Route::get('/admin/vocabularyguideline', [VocabularyManageController::class, 'index'])->name('admin.vocabulary');
Route::post('/admin/vocabularyguideline', [VocabularyManageController::class, 'store'])->name('insert.vocabularyguideline');
Route::delete('/admin/vocabularyguidelineline/{vocabularyguidelineid}', [VocabularyManageController::class, 'delete'])->name('delete.vocabularyguideline');
Route::get('/admin/vocabularyguideline/edit/{vocabularyguidelineid}', [VocabularyManageController::class, 'edit'])->name('edit.vocabularyguidelinecontent');

Route::get('/admin/readingexercise', [ReadingManageController::class, 'index'])->name('admin.readingexercise');
Route::post('/admin/readingexercise', [ReadingManageController::class, 'store'])->name('insert.readingexercise');
Route::delete('/admin/readingexercise/{readexerciseid}', [ReadingManageController::class, 'delete'])->name('delete.readingexercise');
Route::get('/admin/readingexercise/edit/{readexerciseid}', [ReadingManageController::class, 'edit'])->name('edit.readingexercisecontent');

Route::get('/admin/listeningexercise', [ListeningManageController::class, 'index'])->name('admin.listeningexercise');
Route::post('/admin/listeningexercise', [ListeningManageController::class, 'store'])->name('insert.listeningexercise');
Route::delete('/admin/listeningexercise/{listenexerciseid}', [ListeningManageController::class, 'delete'])->name('delete.listeningexercise');
Route::get('/admin/listeningexercise/edit/{listenexerciseid}', [ListeningManageController::class, 'edit'])->name('edit.listeningexercisecontent');

Route::get('/admin/examination', [ExaminationManageController::class, 'index'])->name('admin.examination');
Route::post('/admin/examination', [ExaminationManageController::class, 'store'])->name('insert.examination');
Route::delete('/admin/examination/{examinationid}', [ExaminationManageController::class, 'delete'])->name('delete.examination');
Route::get('/admin/examination/edit/{examinationid}', [ExaminationManageController::class, 'edit'])->name('edit.examinationcontent');
