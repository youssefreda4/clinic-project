<?php


if (Request::checkRequestMethod("GET")) {

    $id = Sanitizer::sanitize($_GET["id"]);
    $status = Sanitizer::sanitize($_GET["status"]);
    $page_number = Sanitizer::sanitize($_GET["page_number"]);

    // helperFunction::dd($_GET);
    // die;

    $validation1 = new Validator();

    if (!$validation1->required($id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-appointments");
        die;
    } elseif (!$validation1->numeric($id, "id")) {
        Session::set("errors", $validation1->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-appointments");
        die;
    } elseif (!Database::checkId("appointment", $id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=all-appointments");
        die;
    }

    if (!$validation1->required($status, "status")) {
        Session::set("errors", $validation1->getErrors()[0]["status"]);
        Response::redirectAdmin("index.php?page=all-appointments");
        die;
    }

    if ($status === "non-active") {
        Database::update("appointment", ["status" => "non-active"], $id);
        Response::redirectAdmin("index.php?page=all-appointments&page_number=$page_number");
        die;
    } elseif ($status === "active") {
        Database::update("appointment", ["status" => "active"], $id);
        Response::redirectAdmin("index.php?page=all-appointments&page_number=$page_number");
        die;
    }

    Response::redirectAdmin("index.php?page=all-appointments");
}
