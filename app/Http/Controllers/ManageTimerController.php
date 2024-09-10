<?php

namespace App\Http\Controllers;

use App\Models\Timer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;

class ManageTimerController extends Controller
{
    function list()
    {
        $timers = Timer::active()->get();


        return view('manage.timer.list', compact('timers'));
    }

    function create()
    {
        return view('manage.timer.create');
    }

    function insert(Request $request)
    {
        $timers = Timer::active()->get();
        foreach ($timers as $timer)
        {
            $timer->status = 'inactive';
            $timer->save();

            Log::info('Timer inactivated by creation of new timer', ['timer' => $timer]);
        }

        $timer = new Timer();
        $timer->start = Carbon::now();
        $timer->status = 'active';
        $timer->label = $request->label;
        $timer->duration = (intval($request->duration) > 0) ? intval($request->duration) : 120;
        $timer->save();

        Log::info('New timer created', ['timer' => $timer]);

        return redirect(url('/'));
    }

    function edit()
    {
        $hourSelectOptions = array();
        for ($i = 0; $i < 24; $i++){
            $hourSelectOptions[] = ['value' => $i, 'label' => $i];
        }

        $minuteSelectOptions = array();
        for ($i = 0; $i < 59; $i++){
            $minuteSelectOptions[] = ['value' => $i, 'label' => $i];
        }

        $timer = Timer::active()->first();
        return view('manage.timer.edit', [
            'timer' => $timer,
            'hourSelectOptions' => $hourSelectOptions,
            'minuteSelectOptions' => $minuteSelectOptions,
            'secondSelectOptions' => $minuteSelectOptions
        ]);
    }

    function update(Request $request)
    {
        $timer = Timer::find($request->id);
        if ($timer && $request->status == 'inactive')
        {
            $timer->status = 'inactive';
            $timer->save();
            Log::info('Timer deactivated');
            return redirect('/manage');

        }

        elseif ($timer && $this->validateRequest($request))
        {
            $date = Carbon::createFromFormat('H:i:s', str_pad($request->hour, 2, 0, STR_PAD_LEFT) . ':' . str_pad($request->minute, 2, 0, STR_PAD_LEFT) . ':' . str_pad($request->second, 2, 0, STR_PAD_LEFT) );
            $timer->start = $date;

            $timer->duration = $request->duration;
            $timer->label = $request->label;
            Log::info('Timer updated', ['timer' => $timer]);
            $timer->save();

        }

        return redirect('/manage');
    }

    function validateRequest($request)
    {
        return ($request->hour != null && preg_match('/^[0-9]*$/', $request->hour)
            && $request->minute != null && preg_match('/^[0-9]*$/', $request->minute)
            && $request->second != null && preg_match('/^[0-9]*$/', $request->second)
            && $request->duration != null && preg_match('/^[0-9]*$/', $request->duration));
    }
}
