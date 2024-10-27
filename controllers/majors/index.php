<?php


$all_majors = Database::count("majors")["count"];
$page_limit = 8;
$page_numbers = $all_majors / $page_limit;
$page_number = $_GET["page_number"] ?? 0;
if ($page_number > $page_numbers) {
    Response::redirect("index.php");
    exit;
    die;
} elseif ($page_number < 0) {
    Response::redirect("index.php");
    exit;
    die;
}
$offset = $page_limit * $page_number;


$majors = Database::getAll("majors", where: "LIMIT $page_limit OFFSET $offset");


require_once BASE_PATH . "views/majors/index.php";
