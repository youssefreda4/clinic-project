<?php

if (Request::checkRequestMethod("POST")) {
    $name = Sanitizer::sanitize($_POST["name"]);
    $salary = Sanitizer::sanitize($_POST["salary"]);
    $major_id = Sanitizer::sanitize($_POST["major"]);
    $clinic_id = Sanitizer::sanitize($_POST["clinic"]);
    $image = $_FILES['image'];

    $validation_add = new Validator();


    //name
    if ($validation_add->required($name, "name")) {
        $validation_add->min($name, "name", 10);
        $validation_add->max($name, "name", 25);
    }

    //salary
    if ($validation_add->required($salary, "salary")) {
        $validation_add->numeric($salary, "salary");
        $validation_add->negative($salary, "salary");
    }

    //image
    $validation_add->required($image['tmp_name'], "image");


    //major
    $validation_add->required($major_id, "major");

    //clinic
    $validation_add->required($clinic_id, "clinic");

    // helperFunction::dd($validation_add->getErrors());
    $allErrors = $validation_add->getErrors();
    if (!empty($allErrors)) {
        foreach ($allErrors as $key => $errors) {
            foreach ($errors as $key => $error) {
                Session::set($key, $error);
            }
        }
        Response::redirectAdmin("index.php?page=add-doctor");
        die;
    } else {

        $ext = pathinfo($image["name"] , PATHINFO_EXTENSION);
        // helperFunction::dd($ext);
        // die;
        $new_name = uniqid("", true) . "." . $ext;
        $direction = BASE_PATH . "database/uploads/" . $new_name;
        move_uploaded_file($image["tmp_name"], $direction);


        $data = [
            "name" => $name,
            "salary" => $salary,
            "image" => $new_name,
            "major_id" => $major_id,
            "clinic_id" => $clinic_id
        ];

        $dbinsert = Database::isertInto("doctors", $data);
        if (!$dbinsert) {
            Session::set("error", "failed to save category");
        } else {
            Session::set("success", "data saved successfully");
        }
    }
    Response::redirectAdmin("index.php?page=add-doctor");
}
