<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => 'auth:sanctum'], function(){
		


//     });



// Route::post('add','App\Http\Controllers\ApiController@StoreData');

// Route::put('update','App\Http\Controllers\ApiController@Update');

// Route::get('search/{name}','App\Http\Controllers\ApiController@Search');

// Route::delete('delete/{id}','App\Http\Controllers\ApiController@Delete');

// Route::post('testdata','App\Http\Controllers\ApiController@testData');
        
// Route::post('fileUpload','App\Http\Controllers\ApiController@fileUpload');
// Route::post("login",'App\Http\Controllers\UserController@index');
// Route::get('data/{id}','App\Http\Controllers\ApiController@getData');
// Route::get('data','App\Http\Controllers\ApiController@Get');
// Route::get('edit','App\Http\Controllers\ApiController@edit');



// Route::get('/', function () {
//     return view('home');
// });

// Route::get('admin','App\Http\Controllers\homeController@index')->name('admin');

// Route::get('hello','App\Http\Controllers\homeController@showData');
Route::get('/search','App\Http\Controllers\project_apiController@showData')->name('search');

Route::get('/showEntries','App\Http\Controllers\project_apiController@showEntry')->name('showEntries');

Route::post('/addMarks','App\Http\Controllers\project_apiController@StoreData')->name('addMarks');

Route::post('/subject','App\Http\Controllers\project_apiController@StoreSubjectEntry')->name('subject');

Route::post('/classEntry','App\Http\Controllers\project_apiController@StoreClassEntry')->name('classEntry');

Route::post('/terminalExamEntry','App\Http\Controllers\project_apiController@StoreTerminalExam')->name('terminalExamEntry');

Route::post('/studentEntry','App\Http\Controllers\project_apiController@StoreStudentEntry')->name('studentEntry');

Route::get('/register','App\Http\Controllers\RegisterController@index')->name('register');

Route::post('/register/save','App\Http\Controllers\RegisterController@store')->name('register.save');

Route::get('/login','App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login/save','App\Http\Controllers\LoginController@store')->name('login.save');

Route::get('/logout','App\Http\Controllers\LogoutController@store')->name('logout');


Route::get('/admin', 'App\Http\Controllers\project_apiController@index')->name('admin');

Route::post('/bulksend','App\Http\Controllers\project_apiController@bulksend')->name('send');

Route::get('/all-notifications','App\Http\Controllers\PushNotificationController@index')->middleware(['auth']);

Route::get('get-notification-form','App\Http\Controllers\PushNotificationController@create')->middleware(['auth']);