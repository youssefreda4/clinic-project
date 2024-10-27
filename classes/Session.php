<?php


class Session
{

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }


    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }


    public static function removeAll()
    {
        unset($_SESSION);
        session_destroy();
    }


    public static function has($key)
    {
        return self::get($key);
    }


    public static function flash($key)
    {
        if (self::has($key)) {
            $value = self::get($key);
            self::remove($key);
            return $value;
        }
    }

    private static function generateId()
    {
        session_regenerate_id();
    }

    public static function getId()
    {
        self::generateId();
        return session_id();
    }

    public static function destroySession($redirect)
    {
        session_destroy();
        Response::redirect($redirect);
        die;
    }
}
