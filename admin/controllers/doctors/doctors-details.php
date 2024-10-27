<?php


if (isset($_GET["d_id"])) {
    $searchD = $_GET["d_id"];

    $doctors_details = Database::getAll("doctors-details", where: "WHERE id= $searchD");
} else {

    $all_doctors = Database::count("doctors")["count"];
    $page_limit = 15;
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

    $doctors_details = Database::getAll("doctors-details", limit: "LIMIT $page_limit OFFSET $offset");
}


require_once BASE_ADMIN_PATH . "views/doctors/doctors-details.php";
