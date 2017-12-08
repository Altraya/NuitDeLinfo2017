<?php
// required headers
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require_once("../../Managers/UserManager.class.php");
 
$data = json_decode(file_get_contents("php://input"));

require_once("../../config/config.php");
$userManager = new UserManager($dbPDO);

if($userManager->signUp($data->name, $data->email, $data->password, 0)){
    $result = array("message" => "User was created.");
}
else{
    $result = array("message" => "Unable to create user.");
}

json_encode($result);

echo $result;