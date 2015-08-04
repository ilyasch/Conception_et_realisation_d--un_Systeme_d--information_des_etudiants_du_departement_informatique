<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => '/', 'uses' =>'WelcomeController@index']);
//Route::get('home', 'HomeController@index');


/* ************** Dashboard Routes all ******************** */

                 //1)-  Télecharger => done
Route::get('/telecharger', 'DashboardController@lister');
//for downland
Route::get('/telecharger/getfile/{id}', [
    'as' => 'get_file', 'uses' => 'DashboardController@show']);

                 //2)- Mes cours => done
Route::get('/', 'DashboardController@courParSemestre');

                //3)- Rechercher => done
Route::post('/rechercher', 'DashboardController@rechercher');

                //4)- PFE => done
Route::get('/pfe', 'DashboardController@pfe');
Route::post('/pfe',[
    'as' => 'pfe_post', 'uses' =>  'DashboardController@pfe_post']);

                //5)- Emlpoi => done
Route::get('/Emploi', 'DashboardController@emploi');
Route::get('/Emploi/{id}', 'DashboardController@getEmploi');

                //6)- Services => done
Route::get('/services', 'DashboardController@services');

Route::post('/services',[
    'as' => 'services', 'uses' => 'DashboardController@services_store']);

                //7)- Gestion du Profile => done
Route::get('/profile',[
    'as' => 'profile', 'uses' => 'DashboardController@profile']);

Route::post('/profile',[
           'as' => 'profile_form', 'uses' => 'DashboardController@profile_store']);

                //9)- Progression => done
Route::get('/prog', 'DashboardController@prog');
                //10)- Ansences => done
Route::get('/absences', 'DashboardController@absences');


/* ********************************************************* */

// Authentification routes;les 5 routes existants f view : auth/[login,register,logout] and password/[email,password]
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('register/verify/{code}', [
    'as' => 'confirmation_code',
    'uses' => 'WelcomeController@confirm'
]);
/**
 * Errors
 */

Route::get('errors', [
    'as' => 'errors', function(){return view('errors.503');}]);

/**
 Admin de pfe
 *
 */
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/admin_pfe', function(){
        return view('admin_pfe');
    });
    Route::get('/admin/affecter','AdminController@show');

    Route::post('/admin/affecter',[
        'as' => 'affectation', 'uses' => 'AdminController@store']);
    Route::get('/services_adm', [
        'as' =>'services_adm', 'uses' =>'AdminController@serv']);
    //for upload
    Route::get('/upload', 'AdminController@form');
    //for downland
    Route::post('/upload/addfile',[
        'as' => 'upload_file', 'uses' => 'AdminController@upload']);
    //for images
    Route::get('/image', 'AdminController@images');
    Route::post('/img',[
        'as' => 'images', 'uses' => 'AdminController@userToFichier']);
});