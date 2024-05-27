<?php

namespace App\Helpers;

class AuthHelper
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function getUserId()
    {
        return $_SESSION['user_id'] ?? null;
    }

    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            header('Location: /login.php');
            exit();
        }
    }

    public static function login($userId)
    {
        $_SESSION['user_id'] = $userId;
    }

    public static function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }
}
