<?php

if (Request::checkRequestMethod("GET")) {
    $doctor_id = Sanitizer::sanitize($_GET["doctor_id"]);
    
    // helperFunction::dd($image_path);
    // die;
    
    $validation1 = new Validator();
    if (!$validation1->required($doctor_id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-doctors");
        die;
    } elseif (!$validation1->numeric($doctor_id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-doctors");
        die;
    } elseif (!Database::checkId("doctors", $doctor_id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=all-doctors");
        die;
    }
    
    $image = Database::getAll("doctors", "image", "WHERE id = $doctor_id");
    $image_path = $image[0]["image"];

    if (isset($image_path)) {
        unlink(BASE_PATH . "database/uploads/" . $image_path);
    }
    Database::deleteRow("doctors", $doctor_id);
    Response::redirectAdmin("index.php?page=all-doctors");
}
