<?php

if (Request::checkRequestMethod("POST")) {
    $name = Sanitizer::sanitize($_POST["name"]);
    $address = Sanitizer::sanitize($_POST["address"]);


    $validation_add = new Validator();


    //name
    if ($validation_add->required($name, "name")) {
        $validation_add->min($name, "name", 5);
        $validation_add->max($name, "name", 25);
    }

    //address
    if ($validation_add->required($address, "address")) {
        $validation_add->min($address, "address", 5);
        $validation_add->max($address, "address", 25);
    }


    // helperFunction::dd($validation_add->getErrors());
    $allErrors = $validation_add->getErrors();
    if (!empty($allErrors)) {
        foreach ($allErrors as $key => $errors) {
            foreach ($errors as $key => $error) {
                Session::set($key, $error);
            }
        }
        Response::redirectAdmin("index.php?page=add-clinic");
        die;
    } else {


        $data = [
            "clinic_name" => $name,
            "address" => $address,
        ];

        $dbinsert = Database::isertInto("clinics", $data);
        if (!$dbinsert) {
            Session::set("error", "failed to save category");
        } else {
            Session::set("success", "data saved successfully");
        }
    }
    Response::redirectAdmin("index.php?page=add-clinic");
}
