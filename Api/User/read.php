<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Managers/UserManager.class.php';
 
// check if more than 0 record found
if($num>0){
 
    $userManager = new UserManager();
    
     // set ID property of product to be edited
    $id = isset($_GET['id']) ? $_GET['id'] : die();
    
    $user = $userManager->getUser($id);
 
    echo json_encode($user);
}
 
else{
    echo json_encode(
        array("message" => "No user found.")
    );
}