<?php

if (Request::checkRequestMethod("GET") && isset($_GET["patient_name"])) {

    $patient_name = Sanitizer::sanitize($_GET["patient_name"]);
    // helperFunction::dd($patient_name);
    // die;
    $patients = Database::getAll("patients", where: "WHERE name = '$patient_name'");
}else{

    $all_doctors = Database::count("patients")["count"];
    $page_limit = 5;
    $page_numbers = $all_doctors / $page_limit;
    $page_number = $_GET["page_number"] ?? 0;
    if ($page_number > $page_numbers) {
        Response::redirectAdmin("index.php");
        exit;
        die;
    } elseif ($page_number < 0) {
        Response::redirectAdmin("index.php");
        exit;
        die;
    }
    $offset = $page_limit * $page_number;
    
    $patients = Database::getAll("patients", limit: "LIMIT $page_limit OFFSET $offset");
}

require_once BASE_ADMIN_PATH . "views/patients/index.php";