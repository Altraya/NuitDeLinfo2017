<?php

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
        require_once("Views/home.php");
    }
}