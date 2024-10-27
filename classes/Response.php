<?php


class Response{
    public static function redirect($path){
        header("location:" . helperFunction::url($path));
    }

    public static function redirectAdmin($path){
        header("location:" . helperFunction::adminUrl($path));
    }
}