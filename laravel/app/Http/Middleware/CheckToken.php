<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id)
    {
        echo "middle id is" . $id . PHP_EOL;
        if ($request->input("token") != "laravelacademy.org") {
            return redirect()->route("hw");
        }
        return $next($request);
    }

    public function terminate($request, $response)
    {
        //todo
    }
}
