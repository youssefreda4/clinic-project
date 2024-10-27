<?php

$majors = Database::getAll("majors");




require_once BASE_ADMIN_PATH . "views/majors/index.php";