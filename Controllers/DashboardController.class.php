<?php

require_once("Managers/AbstractConnectionManager.class.php");
require_once("Managers/UserManager.class.php");

class DashboardController {
    public function dash(){
        require_once("Views/dashboard.php");
    }
}