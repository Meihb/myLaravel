<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if ($request->filled(["a", "b"])) {
            echo "ok";
        } else {
            echo "no";
        }

    }

    public function index()
    {
        $users = DB::select("select * from `users` where id = ?",[1]);
    }
}
