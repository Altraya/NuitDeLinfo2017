<?php

require_once("Controllers/FrontController.class.php");

$frontController = new FrontController();

$module = null;
if(isset($_GET["module"]))
{
    $module = $_GET["module"];
}
FrontController::dispatch($module);