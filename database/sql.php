<?php


$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Connection failed :" . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS `vcare` ";
$result = mysqli_query($conn,$sql);

if ($result) {
    mysqli_close($conn);
    $conn = mysqli_connect("localhost", "root", "", "vcare");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
}


require_once "clinics.php";
require_once "users.php";
require_once "majors.php";
require_once "doctors.php";
require_once "patients.php";
require_once "reports.php";
require_once "appointment.php";
