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
        $users = DB::select("select * from `users` where id = ?", [1]);
//        print_r($users);
        /*
        DB::beginTransaction();
        DB::update("UPDATE `users`  SET updated_at = now() where id = 1");
        DB::commit();//commit 之后就关闭了事务
        DB::update("UPDATE `users` set name='mhb' where id=1");
        */
        $result = DB::table('users')->get(['name', 'id'])->where("id",1);
        var_dump($result);

    }
}
