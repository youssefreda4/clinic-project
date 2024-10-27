<?php
define("BASE_PATH", __DIR__ . DIRECTORY_SEPARATOR);
define("BASE_URL", "http://localhost/oop/clinic/");
session_start();
date_default_timezone_set('Africa/Cairo');

require_once BASE_PATH . "classes/helperFunction.php";
require_once BASE_PATH . "classes/Database.php";
require_once BASE_PATH . "classes/Response.php";
require_once BASE_PATH . "classes/Request.php";
require_once BASE_PATH . "classes/Validator.php";
require_once BASE_PATH . "classes/Session.php";
require_once BASE_PATH . "classes/Sanitizer.php";
Database::connect();


if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case "home":
            $page_name = "Home";
            require_once BASE_PATH . "controllers/home/index.php";
            break;
        case "majors":
            $dirction = "home";
            $page_name = "Majors";
            require_once BASE_PATH . "controllers/majors/index.php";
            break;
        case "doctors":
            $dirction = "home";
            $page_name = "Doctors";
            require_once BASE_PATH . "controllers/doctors/index.php";
            break;
        case "booking":
            $dirction = "doctors";
            $page_name = "Booking";
            require_once BASE_PATH . "controllers/booking/index.php";
            break;
        case "handel-booking":
            require_once BASE_PATH . "controllers/booking/handel-booking.php";
            break;
        case "login":
            $dirction = "home";
            $page_name = "Login";
            require_once BASE_PATH . "controllers/login/index.php";
            break;
        case "handel-login":
            require_once BASE_PATH . "controllers/login/handel-login.php";
            break;
        case "logout":
            require_once BASE_PATH . "controllers/logout/index.php";
            break;
        case "register":
            $dirction = "home";
            $page_name = "Sign Up";
            require_once BASE_PATH . "controllers/register/index.php";
            break;
        case "handel-register":
            require_once BASE_PATH . "controllers/register/handel-register.php";
            break;
        case "contact":
            $dirction = "home";
            $page_name = "Contact";
            require_once BASE_PATH . "controllers/contact/index.php";
            break;
        case "appointments":
            $dirction = "home";
            $page_name = "Appointments";
            require_once BASE_PATH . "controllers/appointments/index.php";
            break;

        default:
            require_once BASE_PATH . "controllers/home/index.php";
    }
} else {
    $page_name = "Not Found";
    require_once BASE_PATH . "views/errors/index.php";
}
