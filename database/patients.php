<?php


$sql = "CREATE TABLE IF NOT EXISTS `patients`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `phone` INT UNIQUE NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `doctor_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`doctor_id`) REFERENCES `doctors`(`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)";

$result = mysqli_query($conn, $sql);

