<?php

// $users = Database::getAll("users");

if (Request::checkRequestMethod("GET") && isset($_GET["user_id"])) {

    $user_id = Sanitizer::sanitize($_GET["user_id"]);

    $users = Database::getAll("users", where: "WHERE id= $user_id");
} else {

    $all_users = Database::count("users")["count"];
    $page_limit = 10;
    $page_numbers = $all_users / $page_limit;
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

    $users = Database::getAll("users", limit: "LIMIT $page_limit OFFSET $offset");
}


require_once(BASE_ADMIN_PATH . "views/users/index.php");
