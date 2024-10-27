<?php


$majors = Database::getAll("majors" ,limit:"limit 3");

$doctors = Database::goinTable("doctors","major_id","majors","id","major_name");

// helperFunction::dd($doctors);

// SELECT doctors.*,majors.major_name FROM `doctors`
// INNER JOIN `majors`
// ON 
// doctors.major_id= majors.id;

require_once BASE_PATH ."views/home/index.php";