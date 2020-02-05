<?php

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
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'sections',
], function () {
    Route::get('/', 'SectionsController@index')
         ->name('sections.section.index');
    Route::get('/create','SectionsController@create')
         ->name('sections.section.create');
    Route::get('/show/{section}','SectionsController@show')
         ->name('sections.section.show')->where('id', '[0-9]+');
    Route::get('/{section}/edit','SectionsController@edit')
         ->name('sections.section.edit')->where('id', '[0-9]+');
    Route::post('/', 'SectionsController@store')
         ->name('sections.section.store');
    Route::put('section/{section}', 'SectionsController@update')
         ->name('sections.section.update')->where('id', '[0-9]+');
    Route::delete('/section/{section}','SectionsController@destroy')
         ->name('sections.section.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'classes',
], function () {
    Route::get('/', 'ClassesController@index')
         ->name('classes.classe.index');
    Route::get('/create','ClassesController@create')
         ->name('classes.classe.create');
    Route::get('/show/{classe}','ClassesController@show')
         ->name('classes.classe.show')->where('id', '[0-9]+');
    Route::get('/{classe}/edit','ClassesController@edit')
         ->name('classes.classe.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClassesController@store')
         ->name('classes.classe.store');
    Route::put('classe/{classe}', 'ClassesController@update')
         ->name('classes.classe.update')->where('id', '[0-9]+');
    Route::delete('/classe/{classe}','ClassesController@destroy')
         ->name('classes.classe.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'etudiants',
], function () {
    Route::get('/', 'EtudiantsController@index')
         ->name('etudiants.etudiant.index');
    Route::get('/create','EtudiantsController@create')
         ->name('etudiants.etudiant.create');
    Route::get('/show/{etudiant}','EtudiantsController@show')
         ->name('etudiants.etudiant.show')->where('id', '[0-9]+');
    Route::get('/{etudiant}/edit','EtudiantsController@edit')
         ->name('etudiants.etudiant.edit')->where('id', '[0-9]+');
    Route::post('/', 'EtudiantsController@store')
         ->name('etudiants.etudiant.store');
    Route::put('etudiant/{etudiant}', 'EtudiantsController@update')
         ->name('etudiants.etudiant.update')->where('id', '[0-9]+');
    Route::delete('/etudiant/{etudiant}','EtudiantsController@destroy')
         ->name('etudiants.etudiant.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'clubs',
], function () {
    Route::get('/', 'ClubsController@index')
         ->name('clubs.club.index');
    Route::get('/create','ClubsController@create')
         ->name('clubs.club.create');
    Route::get('/show/{club}','ClubsController@show')
         ->name('clubs.club.show')->where('id', '[0-9]+');
    Route::get('/{club}/edit','ClubsController@edit')
         ->name('clubs.club.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClubsController@store')
         ->name('clubs.club.store');
    Route::put('club/{club}', 'ClubsController@update')
         ->name('clubs.club.update')->where('id', '[0-9]+');
    Route::delete('/club/{club}','ClubsController@destroy')
         ->name('clubs.club.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'classe_formations',
], function () {
    Route::get('/', 'ClasseFormationsController@index')
         ->name('classe_formations.classe_formation.index');
    Route::get('/create','ClasseFormationsController@create')
         ->name('classe_formations.classe_formation.create');
    Route::get('/show/{classeFormation}','ClasseFormationsController@show')
         ->name('classe_formations.classe_formation.show')->where('id', '[0-9]+');
    Route::get('/{classeFormation}/edit','ClasseFormationsController@edit')
         ->name('classe_formations.classe_formation.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClasseFormationsController@store')
         ->name('classe_formations.classe_formation.store');
    Route::put('classe_formation/{classeFormation}', 'ClasseFormationsController@update')
         ->name('classe_formations.classe_formation.update')->where('id', '[0-9]+');
    Route::delete('/classe_formation/{classeFormation}','ClasseFormationsController@destroy')
         ->name('classe_formations.classe_formation.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'membre_clubs',
], function () {
    Route::get('/', 'MembreClubsController@index')
         ->name('membre_clubs.membre_club.index');
    Route::get('/create','MembreClubsController@create')
         ->name('membre_clubs.membre_club.create');
    Route::get('/show/{membreClub}','MembreClubsController@show')
         ->name('membre_clubs.membre_club.show')->where('id', '[0-9]+');
    Route::get('/{membreClub}/edit','MembreClubsController@edit')
         ->name('membre_clubs.membre_club.edit')->where('id', '[0-9]+');
    Route::post('/', 'MembreClubsController@store')
         ->name('membre_clubs.membre_club.store');
    Route::put('membre_club/{membreClub}', 'MembreClubsController@update')
         ->name('membre_clubs.membre_club.update')->where('id', '[0-9]+');
    Route::delete('/membre_club/{membreClub}','MembreClubsController@destroy')
         ->name('membre_clubs.membre_club.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'posts',
], function () {
    Route::get('/', 'PostsController@index')
         ->name('posts.post.index');
    Route::get('/create','PostsController@create')
         ->name('posts.post.create');
    Route::get('/show/{post}','PostsController@show')
         ->name('posts.post.show')->where('id', '[0-9]+');
    Route::get('/{post}/edit','PostsController@edit')
         ->name('posts.post.edit')->where('id', '[0-9]+');
    Route::post('/', 'PostsController@store')
         ->name('posts.post.store');
    Route::put('post/{post}', 'PostsController@update')
         ->name('posts.post.update')->where('id', '[0-9]+');
    Route::delete('/post/{post}','PostsController@destroy')
         ->name('posts.post.destroy')->where('id', '[0-9]+');
});





  Route::get('/loginforme', 'Auth\LoginEtudiantController@showLoginForm')->name('etudiant.form.login');

   Route::post('/loginetudiant', 'Auth\LoginEtudiantController@login')->name('etudiant.login.submit');


   
 Route::get('/logoutetudiant', 'Auth\LoginEtudiantController@logout')->name('etudiant.logout');


Route::group([
    'prefix' => 'salles',
], function () {
    Route::get('/', 'SallesController@index')
         ->name('salles.salle.index');
    Route::get('/create','SallesController@create')
         ->name('salles.salle.create');
    Route::get('/show/{salle}','SallesController@show')
         ->name('salles.salle.show')->where('id', '[0-9]+');
    Route::get('/{salle}/edit','SallesController@edit')
         ->name('salles.salle.edit')->where('id', '[0-9]+');
    Route::post('/', 'SallesController@store')
         ->name('salles.salle.store');
    Route::put('salle/{salle}', 'SallesController@update')
         ->name('salles.salle.update')->where('id', '[0-9]+');
    Route::delete('/salle/{salle}','SallesController@destroy')
         ->name('salles.salle.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'demande__salles',
], function () {
    Route::get('/', 'DemandeSallesController@index')
         ->name('demande__salles.demande__salle.index');
    Route::get('/create','DemandeSallesController@create')
         ->name('demande__salles.demande__salle.create');
    Route::get('/show/{demandeSalle}','DemandeSallesController@show')
         ->name('demande__salles.demande__salle.show')->where('id', '[0-9]+');
    Route::get('/{demandeSalle}/edit','DemandeSallesController@edit')
         ->name('demande__salles.demande__salle.edit')->where('id', '[0-9]+');
    Route::post('/', 'DemandeSallesController@store')
         ->name('demande__salles.demande__salle.store');
    Route::put('demande__salle/{demandeSalle}', 'DemandeSallesController@update')
         ->name('demande__salles.demande__salle.update')->where('id', '[0-9]+');
    Route::delete('/demande__salle/{demandeSalle}','DemandeSallesController@destroy')
         ->name('demande__salles.demande__salle.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'demande__evenements',
], function () {
    Route::get('/', 'DemandeEvenementsController@index')
         ->name('demande__evenements.demande__evenement.index');
    Route::get('/create','DemandeEvenementsController@create')
         ->name('demande__evenements.demande__evenement.create');
    Route::get('/show/{demandeEvenement}','DemandeEvenementsController@show')
         ->name('demande__evenements.demande__evenement.show')->where('id', '[0-9]+');
    Route::get('/{demandeEvenement}/edit','DemandeEvenementsController@edit')
         ->name('demande__evenements.demande__evenement.edit')->where('id', '[0-9]+');
    Route::post('/', 'DemandeEvenementsController@store')
         ->name('demande__evenements.demande__evenement.store');
    Route::put('demande__evenement/{demandeEvenement}', 'DemandeEvenementsController@update')
         ->name('demande__evenements.demande__evenement.update')->where('id', '[0-9]+');
    Route::delete('/demande__evenement/{demandeEvenement}','DemandeEvenementsController@destroy')
         ->name('demande__evenements.demande__evenement.destroy')->where('id', '[0-9]+');
});
