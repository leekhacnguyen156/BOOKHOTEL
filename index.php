<?php
session_start();
require_once __DIR__ . './mvc/Route.php';
define("root", dirname(__FILE__));
$myapp = new App();
// echo $_SERVER["REQUEST_URI"];
?>