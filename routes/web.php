<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/userhome', function () {
    return view('userhome');
});

Route::get('/adminhome', function () {
    return view('adminhome');
});

Route::get('/register', function () {
    return view('register');
 });


Route::get('/adminregister', function () {
    return view('adminregister');
 });


Route::get('/login', function () {
    return view('login');
});

Route::get('/update{id}', function () {
    return view('updateData');
});

Route::post('/login','UserController@login');
Route::post('/registerUser','UserController@InsertData');

Route::post('/adminregister','AdminController@InsertData');
Route::post('/adminpasswordreset','AdminController@adminpasswordreset');

Route::post('/passwordreset','UserController@passwordreset');
Route::post('/profileupdate','UserController@profileupdate');

Route::get('adminhome','AdminController@index');


Route::post('/updateUser{id}','UserController@update');