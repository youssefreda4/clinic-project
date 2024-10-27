<?php

$sql = "CREATE TABLE IF NOT EXISTS `majors`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `major_name` VARCHAR(255) UNIQUE NOT NULL
)";

$result = mysqli_query($conn, $sql);


// $sql = "INSERT INTO `majors` (`major_name`)
//  VALUES ('Cardiology'),
//         ('Pediatrics'),
//         ('Dermatology'),
//         ('Neurology')";

// $result = mysqli_query($conn, $sql);

