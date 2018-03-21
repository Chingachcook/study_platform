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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lesson', 'LessonController@index');
Route::get('/lessons_list', 'LessonListController@index');
Route::get('/statistics', 'StatisticsController@index');
Route::get('/statistics_lesson', 'StatisticsLessonController@index');
Route::get('/statistics_test', 'StatisticsTestController@index');
Route::get('/test', 'TestController@index');

Route::get('/statistics', function () {
    return view('statistics');
});

Route::get('/home2', function () {
    return view('home2');
});

Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerAutologinController@index');
