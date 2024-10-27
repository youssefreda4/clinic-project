<?php

if (!Session::has("userid")) {
    Response::redirect("index.php?page=home");
    die;
} elseif (Database::checkType("users", Session::get("userid"))) {
    Response::redirect("index.php?page=home");
    die;
}


require_once BASE_ADMIN_PATH . "views/home/index.php";
