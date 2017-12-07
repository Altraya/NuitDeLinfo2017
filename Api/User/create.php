<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../Managers/UserManager.class.php';
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

$userManager = new UserManager();

$userManager->signUp($data->name, $data->mail, $data->password, 0);
 
// set product property values
$user->name = $data->name;
$user->price = $data->price;
$user->description = $data->description;
$user->category_id = $data->category_id;
$user->created = date('Y-m-d H:i:s');
 
// create the product
if($user->create()){
    echo '{';
        echo '"message": "USer was created."';
    echo '}';
}
 
// if unable to create the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to create user."';
    echo '}';
}