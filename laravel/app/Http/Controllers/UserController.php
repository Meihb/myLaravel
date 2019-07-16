<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function show($id)
    {
        return view("user.profile", ["user" => User::findOrFail($id)]);
    }

    public function store(Request $request)
    {
        print_r($request->all());
        var_dump($request->input("d"));
        $d = json_decode($request->input("d"), true);
        var_dump($d);

        if ($request->filled(["a", "b"])) {
            echo "ok";
        } else {
            echo "no";
        }

    }
}
