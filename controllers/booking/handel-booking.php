<?php

if (Request::checkRequestMethod("POST")) {

    $name = Sanitizer::sanitize($_POST["name"]);
    $phone = Sanitizer::sanitize($_POST["phone"]);
    $email = Sanitizer::sanitize($_POST["email"]);
    $doctor_id = Sanitizer::sanitize($_POST["doctor_id"]);
    $clinic_id = Sanitizer::sanitize($_POST["clinic_id"]);
    $user_id = Sanitizer::sanitize(Session::get("userid"));
    $date = date("M / d - g:i a", strtotime('+1 day'));
    // helperFunction::dd($_POST);
    // die;

    $handel_booking = new Validator();

    //name
    if ($handel_booking->required($name, "name")) {
        $handel_booking->max($name, "name", 20);
        $handel_booking->min($name, "name", 5);
    }

    //phone
    if ($handel_booking->required($phone, "phone")) {
        $handel_booking->numeric($phone, "phone");
    }

    //email;
    if ($handel_booking->required($email, "email")) {
        $handel_booking->emailRule2($email, "email");
    }

    if (!empty($handel_booking->getErrors())) {
        foreach ($handel_booking->getErrors() as $key => $errors) {
            foreach ($errors as $key => $error) {
                echo Session::set($key, $error);
            }
        }
        Response::redirect("index.php?page=booking&doctor_id=" . $doctor_id);
        exit;
        die;
    } else {
        $patient_data  = [
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "doctor_id" => $doctor_id,
            "user_id" => $user_id
        ];

        $db_insert_patient  =  Database::isertInto("patients", $patient_data);

        if (!$db_insert_patient) {

            Session::set("error", "Failed to insert patient data. Please try again.");
        } else {

            $appointment_data = [
                "appointment_date" => $date,
                "patient_id" => $db_insert_patient,
                "doctor_id" => $doctor_id
            ];

            $db_insert_appointment = Database::isertInto("appointment", $appointment_data);
            // helperFunction::dd($db_insert_appointment);
            // die;

            if ($db_insert_appointment) {
                Session::set("success", "Booking Successfully!");
            } else {
                Session::set("error", "Failed to book the appointment. Please try again.");
            }
        }
    }


    Response::redirect("index.php?page=booking&doctor_id=$doctor_id&id=$db_insert_appointment&clinic_id=$clinic_id");
}
