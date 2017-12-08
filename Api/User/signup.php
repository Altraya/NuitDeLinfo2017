<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../Managers/UserManager.class.php';

var_dump($_SERVER['QUERY_STRING']);
/*
//get the data
$json = file_get_contents("php://input");
var_dump($json);
/*
//convert the string of data to an array
$data = json_decode($json, true);

print_r($data);/*
/*

require_once("../../config/config.php");
$userManager = new UserManager($dbPDO);
echo $data;
if($userManager->signUp($data->name, $data->mail, $data->password, 0)){
    $result = array("message" => "User was created.");
}
else{
    $result = array("message" => "Unable to create user.");
}

var_dump($result);
json_encode($result);

echo $result;*/