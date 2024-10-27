<?php

class helperFunction
{

    public static function dd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    public static function url($path)
    {
        return BASE_URL  . $path;
    }
    public static function adminUrl($path)
    {
        return BASE_ADMIN_URL  . $path;
    }

    public static function activelink($links)
    {
        if (in_array($_GET["page"], $links)) {
            return 'active';
        }
        return '';
    }

    public static function openNav($links)
    {
        if (in_array($_GET["page"], $links)) {
            return 'menu-open';
        }
        return '';
    }

}
