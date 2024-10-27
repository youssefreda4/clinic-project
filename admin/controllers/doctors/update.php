<?php

if (Request::checkRequestMethod("POST")) {
    $doctor_id = Sanitizer::sanitize($_POST["doctor_id"]);

    $doctor_image = Database::getAll("doctors", "image", "WHERE id=$doctor_id");
    $old_image = $doctor_image[0]["image"];
    // helperFunction::dd($old_name);
    // die;

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
    if (empty($image['tmp_name'])) {
        $new_name = $old_image;
    } else {
        if (file_exists(BASE_PATH . "database/uploads/$old_image")) {
            unlink(BASE_PATH . "database/uploads/$old_image");
        }

        $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
        // helperFunction::dd($ext);
        // die;
        $new_name = uniqid("", true) . "." . $ext;
        $direction = BASE_PATH . "database/uploads/" . $new_name;
        move_uploaded_file($image["tmp_name"], $direction);
    }


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
        Response::redirectAdmin("index.php?page=edit-doctor&doctor_id=$doctor_id");
        die;
    } else {


        $data = [
            "name" => $name,
            "salary" => $salary,
            "image" => $new_name,
            "major_id" => $major_id,
            "clinic_id" => $clinic_id
        ];

        $dbupdate = Database::update("doctors", $data, $doctor_id);
        if (!$dbupdate) {
            Session::set("error", "failed to update doctor");
        } else {
            Session::set("success", "data updated successfully");
        }
    }
    Response::redirectAdmin("index.php?page=edit-doctor&doctor_id=$doctor_id");
}
