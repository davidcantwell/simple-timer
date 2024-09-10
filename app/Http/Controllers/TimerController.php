<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timer;

class TimerController extends Controller
{
    function showActive()
    {
        $t = Timer::active()->first();
        if (!$t)
        {
            return view('timer.none-active');
        }
        else{

            return view('timer.active', [
                'timer' => $t,
                'elements' => $t->getTimeElements()
            ]);
        }
    }
}
