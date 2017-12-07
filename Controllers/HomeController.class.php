<?php
require_once("Managers/AbstractConnectionManager.class.php");
require_once("Managers/UserManager.class.php");

class HomeController {
    
    public function signup()
    {
        require_once("config/config.php");
        $userManager = new UserManager($dbPDO);
        require_once("Views/home.php");
    }
}