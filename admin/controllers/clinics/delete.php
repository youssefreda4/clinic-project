<?php



if (Request::checkRequestMethod("GET")) {
    $clinic_id = Sanitizer::sanitize($_GET["clinic_id"]);


    $validation_clinic = new Validator();
    if (!$validation_clinic->required($clinic_id, "id")) {
        Session::set("errors", $validation_clinic->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-clinics");
        die;
    } elseif (!$validation_clinic->numeric($clinic_id, "id")) {
        Session::set("errors", $validation_clinic->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-clinics");
        die;
    } elseif (!Database::checkId("clinics", $clinic_id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=all-clinics");
        die;
    }

    Database::deleteRow("clinics", $clinic_id);
    Response::redirectAdmin("index.php?page=all-clinics");
}
