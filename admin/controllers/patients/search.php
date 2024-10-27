<?php

if (Request::checkRequestMethod("POST")) {

if (isset($_POST["patient_name"])) {
    $patient_name = Sanitizer::sanitize($_POST["patient_name"]);
    $validation1 = new Validator();
    if (!$validation1->required($patient_name, "name")) {
        Session::set("error", $validation1->getErrors()[0]["name"]);
        Response::redirectAdmin("index.php?page=all-patients");
        die;
    } elseif (!Database::checkName("patients", "name", "name", $patient_name)) {
        Session::set("error", "Not Found Name");
        Response::redirectAdmin("index.php?page=all-patients");
        die;
    }

    Response::redirectAdmin("index.php?page=all-patients&patient_name=$patient_name");
}
} else {

Response::redirectAdmin("index.php");
}