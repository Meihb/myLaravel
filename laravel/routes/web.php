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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome', ["website" => "hello world"]);
})->name("hw");

Route::get('hello', function () {
    return 'Hello, Welcome to LaravelAcademy.org';
});


Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});

Route::redirect("/here", "/");


Route::get("/user/{id}/post/{post?}", function ($id, $post = "default-post") {
    return "User" . $id . ",post" . $post;
});

//Route::get("/user/{pid}/name/{name}", function ($id, $name) {
//    return "User:" . $id . ",name:" . $name;
//})->where(["id" => '[0-9]+', 'name' => '[a-zA-Z]+']);

Route::get("/user/{pid}/name/{name}", function ($id, $name) {//全局pattern是基础uri解析{}而来
    return "User:" . $id . ",name:" . $name;
});

Route::get("user/profile/{name}/id/{id?}", function ($name) {
    //通过路由生成URL
    echo $name;
    return "my route" . \route("profile", [1, 2]);
})->name("profile");
Route::get("redirect", function () {
    return redirect()->route("profile", ["name" => 'default']);
});


Route::get("/test/index", "TestController@index");
Route::get("users/{user}", function (App\User $user) {
    return $user->email;
});


