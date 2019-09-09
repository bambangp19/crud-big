<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user','middleware'=>['auth']], function () {
	Route::get('/', 'UserContorller@index')->name('user.index');
	Route::post('/add', 'UserContorller@adduser')->name('user.create');
	Route::get('/edit/{id}', 'UserContorller@edit')->name('user.edit');
	Route::post('/update', 'UserContorller@update')->name('user.update');
	Route::get('/delete/{id}', 'UserContorller@destroy')->name('user.delete');
	Route::get('/assign/{id}', 'UserContorller@assign')->name('user.assign');
	Route::post('/assign/add', 'UserContorller@assignadd')->name('user.assignadd');


    });

Route::group(['prefix' => 'assign','middleware'=>['auth']], function () {
	Route::get('/', 'AssignmentController@index')->name('assign.index');
	Route::post('/add', 'AssignmentController@addassign')->name('assign.create');
	// Route::get('/edit/{id}', 'UserContorller@edit')->name('user.edit');
	// Route::post('/update', 'UserContorller@update')->name('user.update');
	// Route::get('/delete/{id}', 'UserContorller@destroy')->name('user.delete');


    });

