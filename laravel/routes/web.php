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
    return view('welcome', ["website" => "hello world"]);
});

Route::get('hello', function () {
    return 'Hello, Welcome to LaravelAcademy.org';
});


Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});

Route::redirect("/here", "/");


Route::get("/user/{id}", function ($id) {
    return "User" . $id;
});
