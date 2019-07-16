<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/bar1", function () {
    return "this comes from api post";
});

Route::post("file/upload", function (Request $request) {
    if ($request->hasFile("photo") && $request->file("photo")->isValid()) {
        $photo = $request->file("photo");
        $extension = $photo->extension();
        $store_result = $photo->storeAs("photo", "test.jpg");
        $out_put = ["extension" => $extension, "store_result" => $store_result];
        print_r($out_put);
    }
    exit("no input file");
});