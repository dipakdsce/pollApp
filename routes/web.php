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

Route::post('/signup', 'UserManagementController@signUp');
Route::post('/login', 'UserManagementController@login');
Route::get('/signupform', 'UserManagementController@signUpForm');
Route::get('/loginform', 'UserManagementController@loginForm');

