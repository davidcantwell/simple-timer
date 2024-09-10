<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $casts = ['start' => 'datetime'];

    function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    function timeRemainingInSeconds()
    {
        $tmp = clone $this->start;
        $diff = (int) round(Carbon::now()->diffInSeconds($tmp->addMinutes($this->duration)), 0);

        return ($diff > 0) ? $diff : 0;
    }

    function getTimeElements()
    {
        $hours = 0;
        if ($this->timeRemainingInSeconds() > 3600)
        {
            $hours = (int) floor($this->timeRemainingInSeconds() / 3600);
            $hours = ($hours > 24) ? 24 : $hours;
        }
        $minutes = (int) floor(($this->timeRemainingInSeconds() - $hours * 3600)/60);
        $seconds = (int) floor($this->timeRemainingInSeconds() - $hours * 3600 - $minutes * 60);

        $strHours = str_pad($hours, 2, 0, STR_PAD_LEFT);
        $strMinutes = str_pad($minutes, 2, 0, STR_PAD_LEFT);
        $strSeconds = str_pad($seconds, 2, 0, STR_PAD_LEFT);

        return [
            'h1' => substr($strHours, 0, 1),
            'h2' => substr($strHours, 1, 1),
            'm1' => substr($strMinutes, 0, 1),
            'm2' => substr($strMinutes, 1, 1),
            's1' => substr($strSeconds, 0, 1),
            's2' => substr($strSeconds, 1, 1),
            'h' => $hours,
            'm' => $minutes,
            's' => $seconds
        ];


    }
}
