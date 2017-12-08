<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once("../../Managers/WarningManager.class.php");
 

/*
data object like :
  public 'name' => string 'mon nom' (length=7)
  public 'password' => string 'toto' (length=4)
  public 'email' => string 'tata@toto.com' (length=13)
*/

require_once("../../config/config.php");
$warningManager = new WarningManager($dbPDO);

$warning_arr=array();
foreach($warningManager->getWarning() as $item){
       $warning_item=array(
            "id" => $item->id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
   array_push($warning_arr, $item);
}

$result = json_encode($warning_arr);

echo $result;