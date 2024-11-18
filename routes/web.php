<?php

use App\Http\Controllers\GrammarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListeningController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/vocabularyguideline', [VocabularyController::class, 'index'])->name('vocabularyguideline');
Route::get('/vocabularyguideline/{vocabularyguidelineid}', [VocabularyController::class, 'show'])->name('vocabularyguideline.show');

Route::get('/grammarguideline', [GrammarController::class, 'index'])->name('grammarguideline');
Route::get('/grammarguideline/{grammarguidelineid}', [GrammarController::class, 'show'])->name('grammarguideline.show');

Route::get('/listeningexercise', [ListeningController::class, 'index'])->name('listeningexercise');
Route::get('/listeningexercise/show', [ListeningController::class, 'show'])->name('listeningexercise.show');
