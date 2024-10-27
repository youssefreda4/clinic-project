<?php

if (Request::checkRequestMethod("POST")) {
    $user_id = Sanitizer::sanitize($_POST["userid"]);

    $name = Sanitizer::sanitize($_POST["name"]);
    $username = Sanitizer::sanitize($_POST["username"]);
    $email = Sanitizer::sanitize($_POST["email"]);
    $type = Sanitizer::sanitize($_POST["type"]);

    // helperFunction::dd($_POST);
    // die;

    $handel_update = new Validator();

    //name
    if ($handel_update->required($name, "name")) {
        $handel_update->max($name, "name", 20);
        $handel_update->min($name, "name", 5);
    }

    //username
    if ($handel_update->required($username, "username")) {
        $handel_update->max($username, "username", 15);
        $handel_update->min($username, "username", 5);
    }

    //email;
    if ($handel_update->required($email, "email")) {
        $handel_update->emailRule2($email, "email");
    }

    //type
    $handel_update->required($type, "type");


    if (!empty($handel_update->getErrors())) {
        foreach ($handel_update->getErrors() as $key => $errors) {
            foreach ($errors as $key => $error) {
                echo Session::set($key, $error);
            }
        }
        Response::redirectAdmin("index.php?page=edit-user&id=$user_id");
        exit;
        die;
    } else {
        $data = [
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "type" => $type
        ];
        $dbisert =  Database::update("users", $data, $user_id);


        if (!$dbisert) {
            Session::set("error", "update failed. Please try again.");
        } else {
            Session::set("success", "updated successfully.");
        }
        Response::redirectAdmin("index.php?page=edit-user&id=$user_id");
        
    }
}else{
    Response::redirectAdmin("index.php");
    
}
