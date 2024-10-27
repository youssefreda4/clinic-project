<?php 

$sql = "CREATE TABLE IF NOT EXISTS `appointment` (

    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `appointment_date` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     `status` ENUM('active','non-active') NOT NULL DEFAULT active,
    `patient_id` INT NOT NULL,
    `doctor_id` INT NOT NULL,
    FOREIGN KEY (`doctor_id`) REFERENCES `doctors`(`id`),
    FOREIGN KEY (`patient_id`) REFERENCES `patients`(`id`)

)";

$result = mysqli_query($conn, $sql);
