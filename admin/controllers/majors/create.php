<?php

if (Request::checkRequestMethod("POST")) {
    $name = Sanitizer::sanitize($_POST["name"]);


    $validation_add = new Validator();

    //name
    if ($validation_add->required($name, "name")) {
        $validation_add->min($name, "name", 5);
        $validation_add->max($name, "name", 25);
    }




    // helperFunction::dd($validation_add->getErrors());
    $allErrors = $validation_add->getErrors();
    if (!empty($allErrors)) {
        foreach ($allErrors as $key => $errors) {
            foreach ($errors as $key => $error) {
                Session::set($key, $error);
            }
        }
        Response::redirectAdmin("index.php?page=add-major");
        die;
    } else {

        $data = [
            "major_name" => $name,
        ];

        $dbinsert = Database::isertInto("majors", $data);
        if (!$dbinsert) {
            Session::set("error", "failed to save category");
        } else {
            Session::set("success", "data saved successfully");
        }
    }
    Response::redirectAdmin("index.php?page=add-major");
}
