<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require_once("../../Managers/UserManager.class.php");
 
$data = json_decode(file_get_contents("php://input"));

require_once("../../config/config.php");
$userManager = new UserManager($dbPDO);

if($userManager->signIn($data->name, $data->password)){
    $result = array("message" => "User was login.");
}
else{
    $result = array("message" => "Error login");
}

$result = json_encode($result);

echo $result;