<?php

if (Request::checkRequestMethod("POST")) {
    $name = Sanitizer::sanitize($_POST["name"]);
    $username = Sanitizer::sanitize($_POST["username"]);
    $email = Sanitizer::sanitize($_POST["email"]);
    $password = Sanitizer::sanitize($_POST["password"]);


    $handel_Sign_Up = new Validator();

    //name
    if ($handel_Sign_Up->required($name, "name")) {
        $handel_Sign_Up->max($name, "name", 20);
        $handel_Sign_Up->min($name, "name", 5);
    }

    //username
    if ($handel_Sign_Up->required($username, "username")) {
        $handel_Sign_Up->max($username, "username", 15);
        $handel_Sign_Up->min($username, "username", 5);
    }

    //email;
    if ($handel_Sign_Up->required($email, "email")) {
        $handel_Sign_Up->emailRule2($email, "email");
    }

    //password
    if ($handel_Sign_Up->required($password, "password")) {
        $handel_Sign_Up->alphaNumeric($password, "password");
    }

    if (!empty($handel_Sign_Up->getErrors())) {
        foreach ($handel_Sign_Up->getErrors() as $key => $errors) {
            foreach ($errors as $key => $error) {
                echo Session::set($key, $error);
            }
        }
        Response::redirect("index.php?page=register");
        exit;
        die;
    } else {
        $data = [
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "password" => sha1($password)
        ];
        $dbisert =  Database::isertInto("users", $data);

        Session::set("userid", $dbisert);

        if (!$dbisert) {
            Session::set("error", "Sign-up failed. Please try again.");
        }
    }


    Response::redirect("index.php?page=home");
}
