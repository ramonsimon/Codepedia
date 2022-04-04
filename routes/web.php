<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('artikel-beheer', function () {
   return view('artikel_beheer');
});

Route::get('artikel-toevoegen', function(){
    return view('artikel_toevoegen');
});

Route::get('artikel-wijzigen', function(){
    return view('artikel_wijzigen');
});

Route::get('profiel-bewerken', function(){
    return view('profiel_bewerken');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
