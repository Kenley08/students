<?php
 use App\Http\Auth\RegisterController;
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

Route::get('/', 'accountController@home')->name('home');

Route::get('/user/register',function(){
    return view('user.register.index');
});

// Route::post('/user/register','mailController@SendSignupEmail')->name('register');



Route::resource('students','studentsController');



Route::resource('courses','coursesController');
Route::resource('coursesToFollow','coursesToFollowController');
Route::resource('students.courses','studentsCourseController');
Route::resource('imaj','imagesController');
Route::resource('students.image','studentsImageController');


Route::get('/account/user/create', [
    'as'=>'contact_path',
    'uses'=>'accountController@create'
]);


Route::post('/account/user/create/', [
    'as'=>'contact_path',
    'uses'=>'accountController@store'
]);



Route::post('/account/verify', [
    'as'=>'verify_account_path',
    'uses'=>'accountController@verify'
]);

Route::post('/', [ 'as'=>'login_path',
    'uses'=>'accountController@login']);


    Route::get('/students', [ 'as'=>'logout_path',
    'uses'=>'accountController@logout']);









   
    
