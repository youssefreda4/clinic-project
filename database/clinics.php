<?php

$sql = "CREATE TABLE IF NOT EXISTS `clinics` (
`id` INT PRIMARY KEY AUTO_INCREMENT,
`clinic_name` VARCHAR(255) NOT NULL,
`address` VARCHAR(255) NOT NULL
)";


$result = mysqli_query($conn,$sql);

