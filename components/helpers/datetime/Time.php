<?php

namespace frontend\components\helpers\datetime;

class Time
{
    public static function duration($milliseconds)
    {
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;
        return sprintf('%02d:%02d', $minutes, $remainingSeconds);
    }
}