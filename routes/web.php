<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Articles\Articles;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\Articles\Show;
use App\Http\Livewire\Chiffrecles\Creates as ChiffreclesCreates;
use App\Http\Livewire\Chiffrecles\Listes as ChiffreclesListes;
use App\Http\Livewire\Front\Actualites\Actualites;
use App\Http\Livewire\Front\Actualites\Showactualites;
use App\Http\Livewire\Front\Home;
use App\Http\Livewire\Front\Publications\Avis;
use App\Http\Livewire\Front\Publications\Bulletinsregulateurs;
use App\Http\Livewire\Front\Publications\Etudes;
use App\Http\Livewire\Front\Publications\Seriestatistiques;
use App\Http\Livewire\Front\Reglementations\Arretes;
use App\Http\Livewire\Front\Reglementations\Circulaires;
use App\Http\Livewire\Front\Reglementations\Decrets;
use App\Http\Livewire\Front\Reglementations\Instructions;
use App\Http\Livewire\Front\Reglementations\Lois;
use App\Http\Livewire\Publications\Creates;
use App\Http\Livewire\Publications\Listes;
use App\Http\Livewire\Reglementations\Creates as ReglementationsCreates;
use App\Http\Livewire\Reglementations\Listes as ReglementationsListes;
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

/*
|--------------------------------------------------------------------------
| Web Routes Site artf
|--------------------------------------------------------------------------
*/

/*Route Authentification*/
Auth::routes();

/*Route Front*/
Route::get('/', Home::class)->name('home');

/**route onglet apropos */
Route::group([
    "prefix" => "apropos", 
    'as' => 'apropos.'
], function(){
    Route::get('/mot-du-dg', function () {
        return view('fronts.apropos.mot-du-dg');
    })->name('mot-du-dg');

    Route::get('/comite-de-direction', function () {
        return view('fronts.apropos.comite-de-direction');
    })->name('comite-de-direction');

    Route::get('/direction-generale', function () {
        return view('fronts.apropos.direction-generale');
    })->name('direction-generale');

    Route::get('/missions-et-prerogatives', function () {
        return view('fronts.apropos.missions-et-prerogatives');
    })->name('mission-et-pouvoir');

    Route::get('/organigramme', function () {
        return view('fronts.apropos.organigramme');
    })->name('organigramme');


    Route::get('/directions-centrales', function () {
        return view('fronts.apropos.direction-centrales');
    })->name('direction-centrales');

    Route::get('/directions-centrales/direction-de-linspection-des-statistiques-et-des-etudes', function () {
        return view('fronts.apropos.directionsCentrales.dise');
    })->name('dise');

    Route::get('/directions-centrales/direction-de-la-regulation', function () {
        return view('fronts.apropos.directionsCentrales.dr');
    })->name('dr');

    Route::get('/directions-centrales/direction-des-affaires-juridiques-des-investigations-et-de-la-et-de-la-cooperation', function () {
        return view('fronts.apropos.directionsCentrales.dajic');
    })->name('dajic');

    Route::get('/directions-centrales/direction-financiere', function () {
        return view('fronts.apropos.directionsCentrales.df');
    })->name('df');

    Route::get('/directions-centrales/direction-des-ressources-humaines-et-de-la-logistique', function () {
        return view('fronts.apropos.directionsCentrales.drhl');
    })->name('drhl');
});

/**route onglet reglementation */
Route::group([
    "prefix" => "reglementations", 
    'as' => 'reglementations.'
], function(){
    Route::get("/lois", function () {
        return view('fronts.reglementations.lois');
    })->name("lois");

    Route::get("/decret", )->name("decret");

    Route::get("/arrete", )->name("arrete");

    Route::get("/instructions", )->name("instructions");

    Route::get("/circulaires", )->name("circulaires");
});

/**route onglet observatoires */
Route::group([
    "prefix" => "observatoires", 
    'as' => 'observatoires.'
], function(){
    Route::get('/liste-etablissement-financier', function () {
        return view('fronts.observatoires.liste-etablissement-financier');
    })->name('liste-etablissement-financier');

    Route::get('/obtention-agrement', function () {
        return view('fronts.observatoires.obtention-agrement');
    })->name('obtention-agrement'); 
});

/**route onglet publications */
Route::group([
    "prefix" => "publications", 
    'as' => 'publications.'
], function(){
    Route::get('/series-statistiques', Seriestatistiques::class)->name('series-statistiques');

    Route::get('/avis', Avis::class)->name('avis');

    Route::get("/etudes", Etudes::class)->name("etudes");

    Route::get("/bulletins-regulateur", Bulletinsregulateurs::class)->name("bulletins-regulateur");
});

/**route onglet reglementation */
Route::group([
    "prefix" => "reglementations", 
    'as' => 'reglementations.'
], function(){
    Route::get('/lois', Lois::class)->name('lois');

    Route::get('/decrets', Decrets::class)->name('decrets');

    Route::get("/arretes", Arretes::class)->name("arretes");

    Route::get("/circulaires", Circulaires::class)->name("circulaires");
    
    Route::get("/instructions", Instructions::class)->name("instructions");
});

/**actualites */
Route::group([
    "prefix" => "actualites", 
    'as' => 'actualites.'
], function(){
    Route::get("articles/", Actualites::class)->name("actualites");
    Route::get("article/{slug}", Showactualites::class )->name("actualitedetail");
    Route::get("/recherche", )->name("actualites.search"); 
});

//Route contact 
Route::get('/contact', )->name('contact');
Route::post('/contact', )->name('contact.store');

/*
|--------------------------------------------------------------------------
| Web Routes Back-end Site artf
|--------------------------------------------------------------------------
*/

Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){
    /*Route gestion users*/
    Route::group([
        "prefix" => "habilitations", 
        'as' => 'habilitations.'
    ], function(){
        // hold approch:Route::get("/utilisateurs", [UserController::class, "index"])->name('users.index');
        Route::get("/utilisateurs", Utilisateurs::class)->name('users.index');
    });

    /*Route gestion articles*/
    Route::group([
        "prefix" => "gestionarticles", 
        'as' => 'gestionarticles.'
    ], function(){
        Route::get("/gestionarticles", Articles::class)->name('articles.index');
        Route::get("/aperçu/{slug}", Show::class)->name('articles.show');
    });

    /*Route gestion publications*/
    Route::group([
        "prefix" => "gestionpublications", 
        'as' => 'gestionpublications.'
    ], function(){
        Route::get("/liste-publications", Listes::class)->name('publications.index');
        Route::get("/creation-publications", Creates::class)->name('publications.create');
    });

    /*Route gestion reglementations*/
    Route::group([
        "prefix" => "gestionreglementations", 
        'as' => 'gestionreglementations.'
    ], function(){
        Route::get("/liste-reglementations", ReglementationsListes::class)->name('reglementations.index');
        Route::get("/creation-reglementations", ReglementationsCreates::class)->name('reglementations.create');
    });

    /*Route gestion chiffres cles*/
    Route::group([
        "prefix" => "gestionchiffrecles", 
        'as' => 'gestionchiffrecles.'
    ], function(){
        Route::get("/liste-chiffrecles", ChiffreclesListes::class)->name('chiffrecles.index');
        Route::get("/creation-chiffrecles", ChiffreclesCreates::class)->name('chiffrecles.create');
    });
});

//Route::get('/habilitations/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])->name('user');
