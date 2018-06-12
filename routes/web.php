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
Route::get('/problems', 'ProblemsController@index')->name('problems');

//Отображения для user

Route::get('/lessons_list/{id}', 'UsersController@lessons_list_for_user');
Route::get('/lesson/{id}', 'UsersController@lesson_for_user');
Route::get('/test/{id}', 'TestsController@test_for_user');
Route::get('/video/{id}', 'VideosController@video_for_user');
Route::get('/document/{id}', 'DocumentsController@docx_for_user');
Route::post('/result/{id}', 'TestsController@result');
Route::get('statistics_modules', 'TestsController@statistics');
Route::get('statistics_module/{id}', 'TestsController@statistics_module');
Route::get('statistics_lesson/{id}', 'TestsController@statistics_lesson');

Route::get('/search', 'HomeController@search')->name('search');


Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerAutologinController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

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
Route::resource('admin/statistics', 'Admin\StatisticsController');
Route::resource('admin/problems', 'Admin\ProblemsController');

Route::get('admin/statistics_module_user/{id}', 'Admin\StatisticsController@statistics_modules');
Route::get('admin/statistics_lessons_user/{id}/{id_user}', 'Admin\StatisticsController@statistics_lessons');
Route::get('admin/statistics_lesson_user/{id}/{id_user}', 'Admin\StatisticsController@statistics_lesson_user');

Route::get('admin/lessons_list_admin_stat/{id}', 'Admin\StatisticsController@lessons_list_stat_admin');
Route::get('admin/lesson_admin_stat/{id}', 'Admin\StatisticsController@lesson_stat_admin');

Route::get('admin/lessons/create/{id}', 'Admin\LessonsController@create');

Route::get('admin/tests/create/{id}', 'TestsController@create');
Route::get('admin/{id}/tests', 'TestsController@index2');
Route::get('admin/{id}/videos', 'VideosController@index2');
Route::get('admin/videos/create/{id}', 'VideosController@create');
Route::get('admin/{id}/documents', 'DocumentsController@index2');
Route::get('admin/documents/create/{id}', 'DocumentsController@create');

Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);