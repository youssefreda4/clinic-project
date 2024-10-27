<?php

if (Request::checkRequestMethod("GET") && isset($_GET["search_name"])) {

    $search_name = Sanitizer::sanitize($_GET["search_name"]);
    // helperFunction::dd($search_name);
    // die;
    $reservations = Database::getAll("reservations",where: "WHERE doctor_name = '$search_name'");
} else {

    // $reservations = Database::getAll("reservations");
    $all_doctors = Database::count("reservations")["count"];
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

    $reservations = Database::getAll("reservations", limit: "LIMIT $page_limit OFFSET $offset");
}

require_once BASE_ADMIN_PATH . "views/reservations/index.php";
