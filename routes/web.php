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

Route::get('/', 'HomeController@login');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/create', 'CreateTicketController@index');
    Route::get('/ticket/{slug}', 'HomeController@show')->name('ticket.show');
    Route::get('/department/{slug}', 'HomeController@department')->name('department.show');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/comment', 'CommentsController@store');

});

Route::group([ 'namespace'=>'Admin', 'middleware'=>'admin' ], function () {
    Route::get('/admin' , 'DashboadController@index');
    Route::get('/admin/ticket/{slug}', 'TicketController@index')->name('admin.ticket.index');
    Route::get('/admin/departments/{slug}', 'TicketController@department')->name('admindepartment.show');
    Route::resource('admin/departments', 'DepartmentsController');
    Route::resource('admin/users', 'UsersController');
});