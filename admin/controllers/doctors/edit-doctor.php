<?php

if(Request::checkRequestMethod("GET")){
    $doctor_id = Sanitizer::sanitize($_GET["doctor_id"]);

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


    $doctor = Database::getAll("doctors" , where: "WHERE id = $doctor_id");
    // helperFunction::dd($doctor);
        
}



require_once BASE_ADMIN_PATH . "views/doctors/edit-doctor.php";