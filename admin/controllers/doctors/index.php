<?php


if (Request::checkRequestMethod("GET") && isset($_GET["id"])) {

    $doctor_id = Sanitizer::sanitize($_GET["id"]);
    // helperFunction::dd($doctor_id);
    // die;
    $doctors = Database::getAll("doctors", where: "WHERE id= $doctor_id");
} else {

    $all_doctors = Database::count("doctors")["count"];
    $page_limit = 10;
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

    $doctors = Database::getAll("doctors", limit: "LIMIT $page_limit OFFSET $offset");
}


require_once BASE_ADMIN_PATH . "views/doctors/index.php";
