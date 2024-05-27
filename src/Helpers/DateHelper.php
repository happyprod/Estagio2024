<?php

namespace App\Helpers;

class DateHelper
{
    public static function formatDate($date, $format = 'd/m/Y')
    {
        $dateTime = new \DateTime($date);
        return $dateTime->format($format);
    }

    public static function timeAgo($datetime)
    {
        $time = strtotime($datetime);
        $time = time() - $time;

        if ($time < 60) {
            return 'agora mesmo';
        } elseif ($time < 3600) {
            return (int)($time / 60) . ' minutos atrás';
        } elseif ($time < 86400) {
            return (int)($time / 3600) . ' horas atrás';
        } else {
            return (int)($time / 86400) . ' dias atrás';
        }
    }
}
