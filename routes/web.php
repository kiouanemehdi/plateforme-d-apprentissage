<?php

use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
Route::get('/login', function () {
    return view('login');
});
//test send email it"s not used in production 
Route::get('/sendmail', function () {
   Mail::to('rafapi9855@lerwfv.com')->send( new ConfirmMail() );

});
//request from the welcome page form in the views folder 
Route::get('universite', 'UniversiteController@get_univ');
//request from the univ page form in the views folder 
Route::post('email', 'UniversiteController@get_domain');
//request from the email page form in the views folder 
Route::post('email_verification', 'EtudiantController@test_email');

Route::post('profemail_verification', 'ProfController@test_email');

Route::post('last_step_etd', 'EtudiantController@register');

Route::post('last_step_prf', 'ProfController@register');

Route::post('check_login', 'EtudiantController@check_login');

Route::get('logout', 'ProfController@logout');


Route::get('post/get_post', 'PostController@get_post')->name('post.get_post');
Route::post('post/post_post', 'PostController@post_post')->name('post.post_post');


Route::get('test_session', 'EtudiantController@test_session');

