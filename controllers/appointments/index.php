<?php

// $patients = Database::getAll("reservations",where:"WHERE user_id=".Session::get("userid"));
$patients =  Database::getAll("reservations",where: "WHERE user_id =" . Session::get("userid") . " AND `status` = 'active'");
// $doctors = Database::goinTable("appointment","doctor_id","doctors","id","id","doctor_id","WHERE appointment.doctor_id=153");




// helperFunction::dd($doctors);


// SELECT `doctors`.name,majors.major_name,clinics.*,appointment.appointment_date,patients.*
//   FROM `doctors`
//   INNER JOIN `majors`
//   ON doctors.major_id = majors.id
//   INNER JOIN clinics
//   ON doctors.clinic_id = clinics.id
//   INNER JOIN appointment
//   ON appointment.doctor_id = doctors.id
//   INNER JOIN patients
//   ON patients.doctor_id = doctors.id;




/////view/////
// CREATE VIEW `profiles` AS
// SELECT 
//   doctors.name AS doctor_name,
//   majors.major_name,
//   clinics.clinic_name, 
//   clinics.address, 
//   appointment.appointment_date,
//   patients.*

// FROM `doctors`
// INNER JOIN `majors`
//   ON doctors.major_id = majors.id
// INNER JOIN `clinics`
//   ON doctors.clinic_id = clinics.id
// INNER JOIN `appointment`
//   ON appointment.doctor_id = doctors.id
// INNER JOIN `patients`
//   ON patients.doctor_id = doctors.id;

require_once BASE_PATH . "views/appointments/index.php";
