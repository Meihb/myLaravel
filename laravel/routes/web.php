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
use Illuminate\Http\Request;

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
})->where(['user'=>'[0-9]+']);

//MIDDLEWARE
Route::get("th", function () {
    return 1;
})->middleware('throttle:1,1');

Route::middleware("check_token:2")->get("middle/{id}", function ($id) {
    return $id;
});


//CSRF
Route::get("form_without_csrf_token", function () {
    return '<form method="post" action="/hello_from_form"><button type="submit">提交</button></form>';
});
Route::get("form_with_csrf_token", function () {
    return '<form method="post" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::post("hello_from_form", function () {
    return "hello form";
});

Route::get('task/{id}/delete', function ($id) {
    return '<form method="post" action="' . route('task.delete', [$id]) . '">
                <input type="hidden" name="_method" value="DELETE"> 
                <button type="submit">删除任务</button>
            </form>';
});

Route::delete('task/{id}', function ($id) {
    return 'Delete Task ' . $id;
})->name('task.delete');

//Controller
Route::get("user/{id}", "UserController@show");

Route::any("user/store/{id}", "UserController@store");

//http request
//Route::post("file/upload", function (Request $request) {
//    if ($request->hasFile("photo") && $request->file("photo")->isValid()) {
//        $photo = $request->file("photo");
//        $extension = $photo->extension();
//        $store_result = $photo->storeAs("photo", "test.jpg");
//        $out_put = ["extension" => $extension, "store_result" => $store_result];
//        print_r($out_put);
//    }
//    exit("no input file");
//});


//http response
Route::get("cookie/response", function (Request $request) {
    return response()
        ->json(['name' => 'Abigail', 'state' => 'CA'])
        ->withCallback($request->input('callback'));
    return response()
        ->jsonp($request->input('callback'), ['name' => 'Abigail', 'state' => 'CA']);
    return response("Hello World", 200)->header("content-Type", "text/plain")->cookie("111name", "value", 90);
});

//redirector instance of Response
Route::get("download", function () {//文件下载
    return response()->download(storage_path('app/photo/test.jpg'), '测试图片.jpg');
});

//Route::get("streamDownload", function () {//流式下载
//    return response()->streamDownload(
//        function () {
//            echo GitHub::api('repo')->contents()->readme('laravel', 'laravel')['contents'];
//        },'laravel-readme.md'
//    );
//});


//URL
Route::get("url1", function () {
    echo url()->current();
    echo url()->previous();
});

const SESSION_NAME = "HAHAHA";
//session 需要通过composer 安装predis/predis
//cli composer require predis/predis
Route::get("setSession", function (Request $request) {
    session(["key" => "value"]);
    session()->setId(1);
    session()->put("key11", "value11");
    $arr[SESSION_NAME] = "1";
    $arr['11'] = 2;
    print_r($arr);
});

Route::get("getSession", function (Request $request) {
    return response()->jsonp($request->input('callback'), session()->all());
//    print_r(session()->all());
});

//validateRequests
Route::get("post/create", "PostController@create");

//直接访问会csrf报错
Route::post("post", "PostController@store");

//DB
Route::get('users/db','UserController@index');