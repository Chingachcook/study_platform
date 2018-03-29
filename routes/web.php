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

Route::get('/lessons_list', 'LessonListController@index');
Route::get('/statistics', 'StatisticsController@index');
Route::get('/statistics_lesson', 'StatisticsLessonController@index');
Route::get('/statistics_test', 'StatisticsTestController@index');
Route::get('/test', 'TestController@index');

Route::get('/home2', function () {
    return view('home2');
});

Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerAutologinController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

//Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/modules', 'Admin\ModulesController');
Route::resource('admin/lessons', 'Admin\LessonsController');
Route::resource('admin/documents', 'DocumentsController');
Route::resource('admin/tests', 'TestsController');
Route::resource('admin/videos', 'VideosController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');

Route::get('admin/lessons/create/{id}', 'Admin\LessonsController@create');

Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);