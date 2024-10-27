<?php


// $doctors = Database::getAll("doctors");
if (Request::checkRequestMethod("GET") && isset($_GET["major_id"])) {
    $major_id = $_GET["major_id"];
    if (!Database::checkId("majors", $major_id)) {
        Response::redirect("index.php");
        exit;
        die;
    }

    $doctors = Database::goinTable("doctors", "major_id", "majors", "id", "major_name", where: "WHERE doctors.major_id = $major_id ");
} else {


    $all_doctors = Database::count("doctors")["count"];
    $page_limit = 9;
    $page_numbers = $all_doctors / $page_limit;
    $page_number = $_GET["page_number"] ?? 0;
    if ($page_number >  $page_numbers) {
        Response::redirect("index.php");
        exit;
        die;
    } elseif ($page_number < 0) {
        Response::redirect("index.php");
        exit;
        die;
    }

    $offset = $page_limit * $page_number;

    $doctors = Database::goinTable("doctors", "major_id", "majors", "id", "major_name", where: "LIMIT $page_limit OFFSET $offset");
    // $doctocrs_pages = Database::getAll("doctors", limit: "LIMIT $page_limit OFFSET $offset");
}

// SELECT doctors.*,majors.major_name FROM `doctors`
// INNER JOIN `majors`
// ON 
// doctors.major_id= majors.id;

// SELECT * FROM `doctors`
// INNER JOIN `patients`
// ON doctors.id=patients.doctor_id
// WHERE doctors.id=194;


require_once BASE_PATH . "views/doctors/index.php";
