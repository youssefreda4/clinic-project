<?php


$clinics = Database::getAll("clinics");


require_once BASE_ADMIN_PATH . "views/clinics/index.php";