<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //

    public function create()
    {
        return view("post.create", ["errors" => session("errors")]);
    }

    public function store(Request $request)
    {
//        $validateData = $request->validate([
//            "title" => "required|unique:posts|max:255",
//            'body' => 'required',
//        ]);

        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:255',
                'body' => 'required'
            ]
        );
        if ($validator->fails())
            return redirect("post/create")->withErrors($validator)->withInput();
        return response();
    }
}
