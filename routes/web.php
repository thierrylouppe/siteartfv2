<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\Articles;
use App\Http\Livewire\Publications\Creates;
use App\Http\Livewire\Publications\Listes;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){
    Route::group([
        "prefix" => "habilitations", 
        'as' => 'habilitations.'
    ], function(){
        // hold approch:Route::get("/utilisateurs", [UserController::class, "index"])->name('users.index');
        Route::get("/utilisateurs", Utilisateurs::class)->name('users.index');
    });

    Route::group([
        "prefix" => "gestionarticles", 
        'as' => 'gestionarticles.'
    ], function(){
        Route::get("/gestionarticles", Articles::class)->name('articles.index');
    });

    Route::group([
        "prefix" => "gestionpublications", 
        'as' => 'gestionpublications.'
    ], function(){
        Route::get("/liste-publications", Listes::class)->name('publications.index');
        Route::get("/creation-publications", Creates::class)->name('publications.create');
    });
});

//Route::get('/habilitations/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])->name('user');
