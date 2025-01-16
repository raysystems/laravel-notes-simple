<?php

use App\Http\Controllers\MainController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIfNotLogged;

// auth routes
Route::middleware([CheckIfNotLogged::class])->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});


Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
});


//rotas de edicao e delete
Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::post('/editNoteSubmit', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');
    Route::get('/deleteNote/{id}', [MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteSubmit/{id}', [MainController::class, 'deleteSubmit'])->name('deleteSubmit');

});


Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/newNote', [MainController::class, 'newNote'])->name('newNote');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');
});
