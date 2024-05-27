<?php

namespace App\Helpers;

class ValidationHelper
{
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validateRequired($value)
    {
        return !empty($value);
    }

    public static function validateLength($value, $min, $max = null)
    {
        $length = strlen($value);
        if ($length < $min) {
            return false;
        }
        if ($max !== null && $length > $max) {
            return false;
        }
        return true;
    }
}
