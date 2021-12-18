<?php

/*Path to class files*/
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT. "/src/Controllers/");
define("MODEL_PATH", ROOT. "/src/Models/");
define("VIEW_PATH", ROOT. "/src/Views/");
define("UTILS", ROOT. "/utils/");

/*Database connection config*/
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'magebit');

require_once("Database.php");
require_once("Route.php");
require_once CONTROLLER_PATH. 'Controller.php';
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once UTILS. "Utils.php";

Route::build();