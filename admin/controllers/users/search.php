<?php



if (Request::checkRequestMethod("POST")) {

    if (isset($_POST["user_id"])) {
        $user_id = Sanitizer::sanitize($_POST["user_id"]);
        $validation1 = new Validator();
        if (!$validation1->required($user_id, "id")) {
            Session::set("error", $validation1->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=users");
            die;
        } elseif (!$validation1->numeric($user_id, "id")) {
            Session::set("error", $validation1->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=users");
            die;
        } elseif (!Database::checkId("users", $user_id)) {
            Session::set("error", "Not Found Id");
            Response::redirectAdmin("index.php?page=users");
            die;
        }

        Response::redirectAdmin("index.php?page=users&user_id=$user_id");
    }
} else {

    Response::redirectAdmin("index.php");
}
