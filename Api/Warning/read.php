<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once("../../Managers/WarningManager.class.php");
 require_once("../../Managers/TypeManager.class.php");

/*
data object like :
  public 'name' => string 'mon nom' (length=7)
  public 'password' => string 'toto' (length=4)
  public 'email' => string 'tata@toto.com' (length=13)
*/

require_once("../../config/config.php");
$warningManager = new WarningManager($dbPDO);
$typeManager = new TypeManager($dbPDO);
$wars = [];
$allWarning = $warningManager->getWarning();

foreach($allWarning as $war){
  $war->idType = $typeManager->getTypeById($war->idType);
  
  array_push($wars, $war);
}

$result = json_encode($wars);

echo $result;