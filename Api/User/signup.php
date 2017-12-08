<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../Managers/UserManager.class.php';
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

$userManager = new UserManager();

if($userManager->signUp($data->name, $data->mail, $data->password, 0)){
    echo '{';
        echo '"message": "User was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create user."';
    echo '}';
}