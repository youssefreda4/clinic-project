<?php



if (Request::checkRequestMethod("POST")) {

    if (isset($_POST["search_Details"])) {
        $search_Details = Sanitizer::sanitize($_POST["search_Details"]);
        $validation1 = new Validator();
        if (!$validation1->required($search_Details, "id")) {
            Session::set("error", $validation1->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=doctors-details");
            die;
        } elseif (!$validation1->numeric($search_Details, "id")) {
            Session::set("error", $validation1->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=doctors-details");
            die;
        } elseif (!Database::checkId("doctors-details", $search_Details)) {
            Session::set("error", "Not Found Id");
            Response::redirectAdmin("index.php?page=doctors-details");
            die;
        }

        Response::redirectAdmin("index.php?page=doctors-details&d_id=$search_Details");
    } elseif (isset($_POST["search"])) {
        $search_id = Sanitizer::sanitize($_POST["search"]);

        $validation = new Validator();
        if (!$validation->required($search_id, "id")) {
            Session::set("error", $validation->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=all-doctors");
            die;
        } elseif (!$validation->numeric($search_id, "id")) {
            Session::set("error", $validation->getErrors()[0]["id"]);
            Response::redirectAdmin("index.php?page=all-doctors");
            die;
        } elseif (!Database::checkId("doctors", $search_id)) {
            Session::set("error", "Not Found Id");
            Response::redirectAdmin("index.php?page=all-doctors");
            die;
        }

        Response::redirectAdmin("index.php?page=all-doctors&id=$search_id");
    }
} else {

    Response::redirectAdmin("index.php");
}
