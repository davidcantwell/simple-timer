<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Config;


class StupidLoginController extends Controller
{
    function showForm()
    {
        return view('login.form');
    }

    function login(Request $request)
    {
        $pins = preg_split("/,/", Config::get('app.allowedPins'));
        if (in_array($request->pin, $pins)) {
            $request->session()->put('stupidAuth', 'OK');
            $request->session()->put('stupidAuthStart', Carbon::now());
            return redirect('/manage');
        } else {
            return redirect(url('/login'));
        }
    }
}
