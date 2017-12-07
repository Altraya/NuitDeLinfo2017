<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// check if more than 0 record found
if($num>0){
 
     // set ID property of product to be edited
    $user->id = isset($_GET['id']) ? $_GET['id'] : die();
 
    echo json_encode($products_arr);
}
 
else{
    echo json_encode(
        array("message" => "No user found.")
    );
}