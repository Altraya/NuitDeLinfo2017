<?php

require_once("HomeController.class.php");

class FrontController {
    public static function dispatch($module)
    {
        
        switch ($module) {
            case 'map':
                $homeController = new HomeController();
                $homeController->signup();
                break;
            case 'login':
                $homeController = new HomeController();
                $homeController->login();
                break;
            default: //home and default
                $homeController = new HomeController();
                $homeController->home();
                break;
        }
        
    }
}