<?php



if (Request::checkRequestMethod("GET") && isset($_GET["id"]) ) {
    $user_id = Sanitizer::sanitize($_GET["id"]);

    $validation1 = new Validator();

    if (!$validation1->required($user_id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=users");
        die;
    } elseif (!$validation1->numeric($user_id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=users");
        die;
    } elseif (!Database::checkId("users", $user_id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=users");
        die;
    }

    $user= Database::getAll("users" , where:"WHERE id =$user_id");
}




require_once(BASE_ADMIN_PATH . "views/users/edit-user.php");
