<?php

namespace App\Helpers;

class UrlHelper
{
    public static function baseUrl($path = '')
    {
        return 'http://localhost' . $path;
    }

    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
}
