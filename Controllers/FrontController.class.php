<?php

require_once("HomeController.class.php");
require_once("MapController.class.php");

class FrontController {
    public static function dispatch($module)
    {
        
        switch ($module) {
            case 'map':
                $mapController = new MapController();
                $mapController->map();
                break;
            case 'login':
                $homeController = new HomeController();
                $homeController->login();
                break;
            case 'signup':
                $homeController = new HomeController();
                $homeController->signup();
                break;
            case 'dash':
                $eventController = new EventController();
                $eventController->dash();
                break;
            default: //home and default
                $homeController = new HomeController();
                $homeController->home();
                break;
        }
        
    }
}