<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedisApplyController extends Controller
{
    //

    public function redisConn()
    {
        var_dump(config('redis'));
    }
}
