<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('admin','App\Http\Controllers\homeController@index')->name('admin');

// Route::get('hello','App\Http\Controllers\homeController@showData');
Route::get('/searchMarks','App\Http\Controllers\homeController@showData')->name('search')->middleware(['auth']);

Route::get('/showEntries','App\Http\Controllers\homeController@showEntry')->name('showEntries')->middleware(['auth']);

Route::post('add','App\Http\Controllers\homeController@StoreData')->name('add')->middleware(['auth']);

Route::post('/subjectEntry','App\Http\Controllers\homeController@StoreSubjectEntry')->name('subjectEntry')->middleware(['auth']);

Route::post('/classEntry','App\Http\Controllers\homeController@StoreClassEntry')->name('classEntry')->middleware(['auth']);

Route::post('/terminalExamEntry','App\Http\Controllers\homeController@StoreTerminalExam')->name('terminalExamEntry')->middleware(['auth']);

Route::post('/studentEntry','App\Http\Controllers\homeController@StoreStudentEntry')->name('studentEntry')->middleware(['auth']);

Route::get('/register','App\Http\Controllers\RegisterController@index')->name('register');

Route::post('/register/save','App\Http\Controllers\RegisterController@store')->name('register.save');

Route::get('/login','App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login/save','App\Http\Controllers\LoginController@store')->name('login.save');

Route::get('/logout','App\Http\Controllers\LogoutController@store')->name('logout');


Route::get('/admin', 'App\Http\Controllers\homeController@index')->name('admin')->middleware(['auth']);;

Route::post('send','App\Http\Controllers\PushNotificationController@bulksend')->name('bulksend')->middleware(['auth']);

Route::get('/all-notifications','App\Http\Controllers\PushNotificationController@index')->middleware(['auth']);

Route::get('get-notification-form','App\Http\Controllers\PushNotificationController@create')->middleware(['auth']);

Route::get('/','App\Http\Controllers\LoginController@index')->name('login');