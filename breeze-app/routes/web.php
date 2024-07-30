<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/dashboard/reports', [ProviderController::class, 'reports'])->name('dashboard.reports');
Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire.index'); // Düzeltilen satır


Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire.index');
Route::post('/questionnaire', [QuestionnaireController::class, 'store'])->name('questionnaire.store');

Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire.index');
Route::post('/questionnaire/store', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])->name('user.list');
Route::get('/list', [ListController::class, 'index'])->name('list.index');
use App\Http\Controllers\ListController;

Route::get('/list', [ListController::class, 'index'])->name('list.index');
require __DIR__.'/auth.php';
