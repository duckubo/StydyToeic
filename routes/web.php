<?php

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

// Route để xử lý đăng ký
Route::post('/register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'formLogin'])->name('form_login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('check_user');

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
