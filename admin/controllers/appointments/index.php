<?php

if(!isset($_GET["page_number"])){
    $_GET["page_number"] = 0;
}
// $appointments = Database::getAll("appointment");
$all_doctors = Database::count("appointment")["count"];
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

$appointments = Database::getAll("appointment", limit: "LIMIT $page_limit OFFSET $offset");



require_once BASE_ADMIN_PATH . "views/appointments/index.php";
