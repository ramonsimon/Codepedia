<?php

use App\Http\Controllers\ArticleController;
use App\Http\Livewire\VragenOverzicht;
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
// Admin
Route::group(['middleware' => ['verified', 'role:admin']], function () {
    Route::get('/onderwerpen',\App\Http\Livewire\Onderwerpen::class)->name('onderwerpen');
    Route::get('/artikel/toevoegen',\App\Http\Livewire\ArtikelToevoegen::class)->name('artikel-toevoegen');
    Route::get('/artikel/wijzigen',\App\Http\Livewire\ArtikelWijzigen::class)->name('artikel-wijzigen');
    Route::get('/docent/aanmaken',\App\Http\Livewire\DocentAanmaken::class)->name('docent-aanmaken');
    Route::get('/artikel/beheer',\App\Http\Livewire\ArtikelBeheer::class)->name('artikel-beheer');
    Route::get('/vraag/beheer',\App\Http\Livewire\VraagBeheer::class)->name('vraag-beheer');
    Route::get('/studenten/beheer',\App\Http\Livewire\StudentenBeheer::class)->name('studenten-beheer');
});

Route::group(['middleware' => ['verified-or-guest']], function () {
    Route::get('/artikel/overzicht',\App\Http\Livewire\ArtikelOverzicht::class)->name('artikel-overzicht');
    Route::get('/vragen/overzicht',vragenOverzicht::class)->name('vragen-overzicht');
    Route::get('/vraag/{question:slug}',\App\Http\Livewire\VraagBekijken::class)->name('vraag-bekijken');
    Route::get('/gegevens/bewerken',\App\Http\Livewire\ProfielBewerken::class)->name('profiel-bewerken');

    Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])->name('index');
    Route::get('/artikel/{article:slug}', \App\Http\Livewire\ArtikelBekijken::class)->name('artikel-bekijken');


});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


