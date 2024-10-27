<?php


class Request
{
    public static function checkRequestMethod($method)
    {
        if ($_SERVER["REQUEST_METHOD"] == $method) {
            return true;
        }
        return false;
    }
}
