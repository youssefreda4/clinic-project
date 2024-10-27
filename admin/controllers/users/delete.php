<?php



if (Request::checkRequestMethod("GET")) {
    $user_id = Sanitizer::sanitize($_GET["id"]);
    $validation_user = new Validator();

    if (!$validation_user->required($user_id, "id")) {
        Session::set("errors", $validation_user->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=users");
        die;
    } elseif (!$validation_user->numeric($user_id, "id")) {
        Session::set("errors", $validation_user->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=users");
        die;
    } elseif (!Database::checkId("users", $user_id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=users");
        die;
    }

    Database::deleteRow("users", $user_id);
    Response::redirectAdmin("index.php?page=users");
}
