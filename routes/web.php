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

//Отображения для user

Route::get('/lessons_list/{id}', 'Admin\LessonsController@lessons_list_for_user');
Route::get('/lesson/{id}', 'Admin\LessonsController@lesson_for_user');
Route::get('/test/{id}', 'TestsController@test_for_user');
Route::get('/video/{id}', 'VideosController@video_for_user');
Route::get('/document/{id}', 'DocumentsController@docx_for_user');
Route::post('/result/{id}', 'TestsController@result');
Route::get('statistics_modules', 'TestsController@statistics');
Route::get('statistics_module/{id}', 'TestsController@statistics_module');


Route::get('/statistics', function () {
        return view('statistics');
});
Route::get('/statistics_lesson', function () {
    return view('statistics_lesson');
});
Route::get('/statistics_test', function () {
    return view('statistics_test');
});

Route::get('/home2', function () {
    if (Auth::check())
    {
        return view('home2');
    }
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

Route::get('admin/tests/create/{id}', 'TestsController@create');
Route::get('admin/{id}/tests', 'TestsController@index2');
Route::get('admin/{id}/videos', 'VideosController@index2');
Route::get('admin/videos/create/{id}', 'VideosController@create');
Route::get('admin/{id}/documents', 'DocumentsController@index2');
Route::get('admin/documents/create/{id}', 'DocumentsController@create');

Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);