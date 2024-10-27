<?php

if (Request::checkRequestMethod("POST")) {

    $email = Sanitizer::sanitize($_POST["email"]);
    $password = Sanitizer::sanitize($_POST["password"]);

    // helperFunction::dd($_POST);

    $handel_login = new Validator();

    //email;
    if ($handel_login->required($email, "email")) {
        $handel_login->emailRule2($email, "email");
    }

    //password
    $handel_login->required($password, "password");


    if (!empty($handel_login->getErrors())) {
        foreach ($handel_login->getErrors() as $key => $errors) {
            foreach ($errors as $key => $error) {
                echo Session::set($key, $error);
            }
        }
        Response::redirect("index.php?page=login");
        exit;
        die;
    } else {    

        $id = Database::checkLogin('users', $email, sha1($password));

        // $dbcheck = Database::checkLogin(`users`,$email,$password);
        if ($id) {
            Session::set("userid", $id);
            if(!Database::checkType("users",$id)){
            Response::redirect("admin/index.php?page=home");
            die;
            }
        } else {
            Session::set("error", "email or password incorrect");
            Response::redirect("index.php?page=login");
            die;
        }
    }


    Response::redirect("index.php?page=home");
}
