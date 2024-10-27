<?php


$sql = "CREATE TABLE IF NOT EXISTS `reports` (
    `report_id` INT PRIMARY KEY AUTO_INCREMENT,
    `details` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `doctor_id` INT NOT NULL,
    `patient_id` INT NOT NULL,
    FOREIGN KEY (`doctor_id`) REFERENCES `doctors`(`id`),
    FOREIGN KEY (`patient_id`) REFERENCES `patients`(`id`)
)";

$result = mysqli_query($conn, $sql);
