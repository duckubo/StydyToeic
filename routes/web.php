<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ExaminationManageController;
use App\Http\Controllers\Admin\GrammarManageController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ListeningManageController;
use App\Http\Controllers\Admin\ReadingManageController;
use App\Http\Controllers\Admin\VocabularyManageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListeningController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    if (Auth::user()->role_id == 1) {
        return redirect('/home');
    }
    if (Auth::user()->role_id == 2) {
        return redirect('/admin/dashboard');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function () {
    auth()->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile/{id}', [AuthController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [AuthController::class, 'update'])->name('update.profile');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::post('/resultlistening', [ListeningController::class, 'result'])->name('resultlistening');
Route::post('/resultreading', [ReadingController::class, 'result'])->name('resultreading');
Route::post('/comment', [GrammarController::class, 'commentHandle'])->name('comment');

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
Route::post('/admin/account', [AccountController::class, 'store'])->name('account.store');
Route::delete('/admin/account/{id}', [AccountController::class, 'delete'])->name('account.delete');

Route::get('profile-manage/{id}', [AccountController::class, 'profile'])->name('admin.profile');
Route::post('/update-profile-manage', [AccountController::class, 'update'])->name('admin.update.profile');

// Danh sách bài hướng dẫn ngữ pháp
Route::get('/admin/grammarguideline', [GrammarManageController::class, 'index'])->name('admin.grammar');
Route::post('/admin/grammarguideline', [GrammarManageController::class, 'store'])->name('insert.grammarguideline');
Route::delete('/admin/grammarguideline/{grammarguidelineid}', [GrammarManageController::class, 'delete'])->name('delete.grammarguideline');
Route::get('/admin/grammarguideline/edit', [GrammarManageController::class, 'edit'])->name('edit.grammarguidelinecontent');
Route::post('/admin/grammarguidelinecontent', [GrammarManageController::class, 'update'])->name('grammarguidelinecontent.update');

Route::get('/admin/vocabularyguideline', [VocabularyManageController::class, 'index'])->name('admin.vocabulary');
Route::post('/admin/vocabularyguideline', [VocabularyManageController::class, 'store'])->name('insert.vocabularyguideline');
Route::delete('/admin/vocabularyguideline/{vocabularyguidelineid}', [VocabularyManageController::class, 'delete'])->name('delete.vocabularyguideline');
Route::get('/admin/vocabularyguideline/edit', [VocabularyManageController::class, 'edit'])->name('edit.vocabularyguidelinecontent');
Route::get('/admin/vocabularyguidelinemedia', [VocabularyManageController::class, 'media'])->name('media.vocabularyguideline');
Route::post('/admin/vocabularyguidelinemedia', [VocabularyManageController::class, 'media_insert'])->name('media.insert.vocabularyguideline');

Route::get('/admin/readingexercise', [ReadingManageController::class, 'index'])->name('admin.readingexercise');
Route::post('/admin/readingexercise', [ReadingManageController::class, 'store'])->name('insert.readingexercise');
Route::delete('/admin/readingexercise/{readexerciseid}', [ReadingManageController::class, 'delete'])->name('delete.readingexercise');
Route::get('/admin/readingexercise/edit', [ReadingManageController::class, 'edit'])->name('edit.readingexercisecontent');
Route::post('/admin/readingexercisecontent', [ReadingManageController::class, 'update'])->name('readingexercisecontent.update');

Route::get('/admin/listeningexercise', [ListeningManageController::class, 'index'])->name('admin.listeningexercise');
Route::post('/admin/listeningexercise', [ListeningManageController::class, 'store'])->name('insert.listeningexercise');
Route::delete('/admin/listeningexercise/{listenexerciseid}', [ListeningManageController::class, 'delete'])->name('delete.listeningexercise');
Route::get('/admin/listeningexercise/edit', [ListeningManageController::class, 'edit'])->name('edit.listeningexercisecontent');
Route::post('/admin/listeningexercisecontent', [ListeningManageController::class, 'update'])->name('listeningexercisecontent.update');
Route::get('/admin/listeningexercisemedia', [ListeningManageController::class, 'media'])->name('media.listeningexercise');
Route::post('/admin/listeningexercisemedia', [ListeningManageController::class, 'media_insert'])->name('media.insert.listeningexercise');

Route::get('/admin/examination', [ExaminationManageController::class, 'index'])->name('admin.examination');
Route::post('/admin/examination', [ExaminationManageController::class, 'store'])->name('insert.examination');
Route::delete('/admin/examination/{examinationid}', [ExaminationManageController::class, 'delete'])->name('delete.examination');

Route::get('/admin/examination/edit', [ExaminationManageController::class, 'edit'])->name('edit.examinationcontent');
Route::post('/admin/examinationcontent', [ExaminationManageController::class, 'update'])->name('examinationcontent.update');
Route::get('/admin/examinationmedia', [ExaminationManageController::class, 'media'])->name('media.examination');
Route::post('/admin/examinationmedia', [ExaminationManageController::class, 'media_insert'])->name('media.insert.examination');

Route::get('excel/upload', [ExcelController::class, 'showUploadForm']);
Route::post('excel/import', [ExcelController::class, 'importExcel'])->name('excel.import');

Route::post('/vocabulary/import', [VocabularyManageController::class, 'importExcel'])->name('vocabulary.import');
Route::post('/readingexercise/import', [ReadingManageController::class, 'importExcel'])->name('readingexercise.import');
Route::post('/listenexercise/import', [ListeningManageController::class, 'importExcel'])->name('listenexercise.import');

Route::post('/examination/import', [ExaminationManageController::class, 'importExcel'])->name('examination.import');

Route::post('/chat', [ChatGPTController::class, 'sendMessage']);
Route::get('/chatbox', [ChatGPTController::class, 'chatInit'])->name('chatbox');

