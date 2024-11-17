<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/vocabularyguideline', [VocabularyController::class, 'index'])->name('vocabularyguideline');
Route::get('/vocabularyguideline/{vocabularyguidelineid}', [VocabularyController::class, 'show'])->name('vocabularyguideline.show');
