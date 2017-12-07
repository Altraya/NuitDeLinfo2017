<?php

require_once("Controllers/FrontController.class.php");

$frontController = new FrontController();

FrontController::dispatch();