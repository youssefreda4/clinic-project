<?php



if (Request::checkRequestMethod("GET")) {
    $major_id = Sanitizer::sanitize($_GET["major_id"]);


    $validation_major = new Validator();
    if (!$validation_major->required($major_id, "id")) {
        Session::set("errors", $validation_major->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-majors");
        die;
    } elseif (!$validation_major->numeric($major_id, "id")) {
        Session::set("errors", $validation_major->getErrors()[0]["id"]);
        Response::redirectAdmin("index.php?page=all-majors");
        die;
    } elseif (!Database::checkId("majors", $major_id)) {
        Session::set("errors", "Not Found Id");
        Response::redirectAdmin("index.php?page=all-majors");
        die;
    }

    Database::deleteRow("majors", $major_id);
    Response::redirectAdmin("index.php?page=all-majors");
}
