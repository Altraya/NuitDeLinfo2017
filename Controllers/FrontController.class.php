<?php

require_once("HomeController.class.php");

class FrontController {
    public static function dispatch()
    {
        
        /*switch ($variable) {
            case 'value':
                // code...
                break;
            
            default:
                // code...
                break;
        }*/
        $homeController = new HomeController();
        $homeController->signup();
    }
}