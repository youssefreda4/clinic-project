<?php



if (Request::checkRequestMethod("POST")) {

    if (isset($_POST["search_name"])) {
        $search_name = Sanitizer::sanitize($_POST["search_name"]);
        $validation1 = new Validator();
        if (!$validation1->required($search_name, "name")) {
            Session::set("error", $validation1->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=reservations");
            die;
        } elseif (!Database::checkName("reservations", "doctor_name", "doctor_name", $search_name)) {
            Session::set("error", "Not Found Name");
            Response::redirectAdmin("index.php?page=reservations");
            die;
        }

        Response::redirectAdmin("index.php?page=reservations&search_name=$search_name");
    }
} else {

    Response::redirectAdmin("index.php");
}
