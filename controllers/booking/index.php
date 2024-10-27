<?php

if (Request::checkRequestMethod("GET") && isset($_GET["doctor_id"])) {
    $doctor_id = $_GET["doctor_id"];

    if (isset($_GET["id"]) && isset($_GET["clinic_id"])) {
        $appointment_id = $_GET["id"];
        $clinic_id = $_GET["clinic_id"];
        // helperFunction::dd($_GET);
        // die;

        if (!Database::checkId("appointment", $appointment_id)) {
            Response::redirect("index.php");
            exit;
            die;
        } elseif (!Database::checkId("clinics", $clinic_id)) {
            //     helperFunction::dd($_GET);
            // die;
            Response::redirect("index.php");
            exit;
            die;
        }

        $date = Database::getAll("appointment", "appointment_date", "WHERE `id` = $appointment_id");
        $address = Database::getAll("clinics", "address", "WHERE `id` = $clinic_id");
        $address = $address[0]["address"];
        $appointment = $date[0]["appointment_date"] ?? "";

        Session::set("date", $appointment);
        Session::set("address", $address);
        // helperFunction::dd($appointment);
        // die;
    }

    $addresses = Database::getAll("clinics");

    if (!Database::checkId("doctors", $doctor_id)) {
        Response::redirect("index.php");
        exit;
        die;
    }
    $doctor = Database::goinTable("doctors", "major_id", "majors", "id","major_name",where: "WHERE doctors.id = $doctor_id");
}



require_once BASE_PATH . "views/booking/index.php";
