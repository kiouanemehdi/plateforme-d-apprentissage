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
    return view('welcome');
});
Route::get('universite', 'UniversiteController@get_univ');
Route::post('email', 'UniversiteController@get_domain');
Route::post('email_verification', 'EtudiantController@test_email');

Route::post('last_step_etd', 'EtudiantController@register');
Route::post('last_step_prf', 'ProfController@register');

Route::get('test_session', 'EtudiantController@test_session');