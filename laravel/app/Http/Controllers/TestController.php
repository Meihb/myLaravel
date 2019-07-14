<?php
/**
 * Created by PhpStorm.
 * User: 12538
 * Date: 2019-7-14
 * Time: 19:19
 */

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        var_dump(config());
    }
}