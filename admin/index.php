<?php

define("BASE_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("BASE_URL", "http://localhost/oop/clinic/");

define("BASE_ADMIN_PATH", BASE_PATH . "admin" . DIRECTORY_SEPARATOR);
define("BASE_ADMIN_URL", "http://localhost/oop/clinic/admin/");
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

// echo helperFunction::dd(BASE_PATH);
// echo helperFunction::url("index");

$home = helperFunction::adminUrl("index.php?page=home");

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case "home":
            $page_name = "Home";
            require_once BASE_ADMIN_PATH . "controllers/home/index.php";
            break;

        case 'users':
            $page_name = "All Users";
            require_once BASE_ADMIN_PATH . "controllers/users/index.php";
            break;
        case 'search-user':
            $page_name = "All Users";
            require_once BASE_ADMIN_PATH . "controllers/users/search.php";
            break;
        case 'edit-user':
            $page_name = "Edit User";
            require_once BASE_ADMIN_PATH . "controllers/users/edit-user.php";
            break;
        case 'update-user':
            require_once BASE_ADMIN_PATH . "controllers/users/update.php";
            break;
        case 'delete-user':
            require_once BASE_ADMIN_PATH . "controllers/users/delete.php";
            break;

        case "all-doctors":
            $page_name = "All Doctors";
            require_once BASE_ADMIN_PATH . "controllers/doctors/index.php";
            break;

        case "search":
            require_once BASE_ADMIN_PATH . "controllers/doctors/search.php";
            break;

        case "doctors-details":
            $page_name = "Doctors Details";
            require_once BASE_ADMIN_PATH . "controllers/doctors/doctors-details.php";
            break;

        case "add-doctor":
            $page_name = "Add Doctor";
            require_once BASE_ADMIN_PATH . "controllers/doctors/add-doctor.php";
            break;

        case "create":
            require_once BASE_ADMIN_PATH . "controllers/doctors/create.php";
            break;

        case "delete-doctor":
            require_once BASE_ADMIN_PATH . "controllers/doctors/delete.php";
            break;
        case "edit-doctor":
            $page_name = "Edit Doctor";
            require_once BASE_ADMIN_PATH . "controllers/doctors/edit-doctor.php";
            break;
        case "update":
            require_once BASE_ADMIN_PATH . "controllers/doctors/update.php";
            break;

        case "all-majors":
            $page_name = "Majors";
            require_once BASE_ADMIN_PATH . "controllers/majors/index.php";
            break;
        case "add-major":
            $page_name = "Add Majors";
            require_once BASE_ADMIN_PATH . "controllers/majors/add-major.php";
            break;
        case "create-major":
            require_once BASE_ADMIN_PATH . "controllers/majors/create.php";
            break;
        case "delete-major":
            $page_name = "Majors";
            require_once BASE_ADMIN_PATH . "controllers/majors/delete.php";
            break;
        case "all-clinics":
            $page_name = "Clinics";
            require_once BASE_ADMIN_PATH . "controllers/clinics/index.php";
            break;
        case "add-clinic":
            $page_name = "Add Clinic";
            require_once BASE_ADMIN_PATH . "controllers/clinics/add-clinic.php";
            break;
        case "create-clinic":
            require_once BASE_ADMIN_PATH . "controllers/clinics/create.php";
            break;
        case "delete-clinic":
            require_once BASE_ADMIN_PATH . "controllers/clinics/delete.php";
            break;
        case "all-patients":
            $page_name = "All Patients";
            require_once BASE_ADMIN_PATH . "controllers/patients/index.php";
            break;
        case "patient_search":
            require_once BASE_ADMIN_PATH . "controllers/patients/search.php";
            break;
        case "reservations":
            $page_name = "All Reservations";
            require_once BASE_ADMIN_PATH . "controllers/reservations/index.php";
            break;
        case "search_name":
            require_once BASE_ADMIN_PATH . "controllers/reservations/search.php";
            break;
        case "all-appointments":
            $page_name = "All Appointments";
            require_once BASE_ADMIN_PATH . "controllers/appointments/index.php";
            break;
        case "status":
            require_once BASE_ADMIN_PATH . "controllers/appointments/status.php";
            break;


        default:
            require_once BASE_ADMIN_PATH . "controllers/home/index.php";
            break;
    }
} else {
    $page_name = "Not Found";
    require_once BASE_ADMIN_PATH . "views/errors/index.php";
}
