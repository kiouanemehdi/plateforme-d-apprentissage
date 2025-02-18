<?php

use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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

Route::post('profemail_verification', 'ProfController@test_email')->name('profemail_verification');

Route::post('last_step_etd', 'EtudiantController@register');

Route::post('last_step_prf', 'ProfController@register');

Route::post('check_login', 'EtudiantController@check_login');

Route::get('logout', 'ProfController@logout');


Route::get('postg', 'PostController@get_post')->name('postg');
Route::post('posts','PostController@postpost')->name('posts');
//Student posts routes
Route::post('sposts','StudentPostsController@studentPost')->name('sposts');
Route::post('addclasss','ClasseController@addNewClass')->name('addclasss');
Route::post('postrep','ReponseController@post_rep')->name('postrep');
Route::post('getclasses','ClasseController@get_classes')->name('getclasses');
////
Route::get('studentposts', 'StudentPostsController@get_post')->name('studentposts');

Route::post('get_id_rep','ReponseController@get_id_rep')->name('get_id_rep');
Route::get('reponse_get','ReponseController@get_reponse')->name('reponse_get');
Route::get('reponse_get_test','ReponseController@get_reponse_test')->name('reponse_get_test');

Route::post('get_id_class','PostController@get_id_class')->name('get_id_class');
Route::post('get_id_new_class','InscritController@get_id_new_class')->name('get_id_new_class');

Route::post('check_class_code','InscritController@check_class_code')->name('check_class_code');

Route::get('choix_class','ClasseController@get_choix_class')->name('choix_class');

Route::post('before_int','ClasseController@redirect_int');

Route::get('postg_etd', 'PostController@get_post_etd')->name('postg_etd');

Route::post('get_id_rep1','ReponseController@get_id_rep1')->name('get_id_rep1');
Route::get('reponse_get1','ReponseController@get_reponse1')->name('reponse_get1');

Route::post('get_etat_reponse','ReponseController@get_etat_reponse')->name('get_etat_reponse');
Route::post('get_id_etat_reponse','ReponseController@get_id_etat_reponse')->name('get_id_etat_reponse');

Route::get('test_session', 'EtudiantController@test_session');



