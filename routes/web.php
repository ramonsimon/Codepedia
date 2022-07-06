<?php

use App\Http\Controllers\ArticleController;
use App\Http\Livewire\ArtikelBeheer;
use App\Http\Livewire\ArtikelBekijken;
use App\Http\Livewire\ArtikelOverzicht;
use App\Http\Livewire\ArtikelToevoegen;
use App\Http\Livewire\ArtikelWijzigen;
use App\Http\Livewire\DocentAanmaken;
use App\Http\Livewire\Index;
use App\Http\Livewire\Onderwerpen;
use App\Http\Livewire\ProfielBewerken;
use App\Http\Livewire\StudentenBeheer;
use App\Http\Livewire\VraagBeheer;
use App\Http\Livewire\VraagBekijken;
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
    Route::get('/onderwerpen', Onderwerpen::class)->name('onderwerpen');
    Route::get('/artikel/toevoegen', ArtikelToevoegen::class)->name('artikel-toevoegen');
    Route::get('/artikel/wijzigen', ArtikelWijzigen::class)->name('artikel-wijzigen');
    Route::get('/docent/aanmaken', DocentAanmaken::class)->name('docent-aanmaken');
    Route::get('/artikel/beheer', ArtikelBeheer::class)->name('artikel-beheer');
    Route::get('/vraag/beheer', VraagBeheer::class)->name('vraag-beheer');
    Route::get('/studenten/beheer', StudentenBeheer::class)->name('studenten-beheer');
});

Route::group(['middleware' => ['verified-or-guest']], function () {
    Route::get('/artikel/overzicht', ArtikelOverzicht::class)->name('artikel-overzicht');
    Route::get('/vragen/overzicht',vragenOverzicht::class)->name('vragen-overzicht');
    Route::get('/vraag/{question:slug}', VraagBekijken::class)->name('vraag-bekijken');

    Route::get('/', Index::class)->name('index');
    Route::get('/artikel/{article:slug}', ArtikelBekijken::class)->name('artikel-bekijken');

});

Route::group(['middleware' => ['verified']], function () {
    Route::get('/gegevens/bewerken', ProfielBewerken::class)->name('profiel-bewerken');
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


