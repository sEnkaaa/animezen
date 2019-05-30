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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/anime-streaming', 'AnimeListController@index')->name('animeList');
Route::get('/anime-streaming-{filter}', 'AnimeListController@filter')->name('animeListFilter');
Route::get('/anime/{anime_uri}', 'AnimeController@index')->name('anime');
Route::get('/anime/{anime_uri}/{episode_uri}', 'EpisodeController@index')->name('animeEpisode');

Route::prefix(env('ADMIN_URI'))->group(function() {

	Route::get('/login', 'AdminLoginController@index')->name('adminLogin');
	Route::post('/login', 'AdminLoginController@store');

	Route::middleware(['admin'])->group(function () {
		Route::get('/', 'AdminHomeController@index')->name('adminHome');
		Route::get('/anime-list', 'AdminAnimeListController@index')->name('adminAnimeList');
		Route::get('/anime-list/{filter}', 'AdminAnimeListController@filter')->name('adminAnimeListFilter');
		Route::get('/anime/create', 'AdminCreateAnimeController@index')->name('adminNewAnime');
		Route::post('/anime/create', 'AdminCreateAnimeController@store');
		Route::get('/anime/{anime_uri}/edit', 'AdminEditAnimeController@index')->name('adminEditAnime');
	});

});