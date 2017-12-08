<?php

require_once("HomeController.class.php");
require_once("MapController.class.php");
require_once("DashboardController.class.php");
require_once("EventController.class.php");

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
            case 'dashboard':
                $dashboardController = new DashboardController();
                $dashboardController->dash();
                break;
            case "home":
                $homeController = new HomeController();
                $homeController->home();
                break;
            default: //home and default
                $homeController = new HomeController();
                $homeController->home();
                break;
        }
        
    }
}