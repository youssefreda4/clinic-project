<?php


$sql = "CREATE TABLE IF NOT EXISTS `doctors`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) UNIQUE NOT NULL,
    `salary` INT NOT NULL,
    `image` VARCHAR(255)  NOT NULL,
    `major_id` INT NOT NULL,
    `clinic_id` INT NOT NULL,
    FOREIGN KEY (`major_id`) REFERENCES `majors`(`id`),
    FOREIGN KEY (`clinic_id`) REFERENCES `clinics`(`id`)
)";

$result = mysqli_query($conn, $sql);



// $sql = "INSERT INTO `doctors` (`name`, `image`, `major_id`)
//                        VALUES ('Dr. John Smith', 'john_smith.jpg', 1),
//                               ('Dr. Emily Clark', 'emily_clark.jpg', 2),
//                               ('Dr. Ahmed Ali', 'ahmed_ali.jpg', 3),
//                               ('Dr. Sara Wilson', 'sara_wilson.jpg', 1)
// ";

// $result = mysqli_query($conn, $sql);

