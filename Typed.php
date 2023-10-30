<?php

$imei = $_GET['imei'] ?? '';

if (empty($imei) || strlen($imei) < 14) {
    die("Missing or invalid IMEI!");
}

require_once "Class/AldazClass.php";

$ClassCheck = new ClassChecker();

try 
{
    $Model = $ClassCheck->GetModelInfo($imei);
    $ModelParts = explode('Model:', $Model);
    $ModelExtraido = explode('<br>', $ModelParts[1])[0];
    $ObtenerModelNumberID = $ClassCheck->GetModelNumberID($ModelExtraido);
    $ChecarGSM = $ClassCheck->CheckItsGSM($ObtenerModelNumberID);

    if ($ChecarGSM != "xd") {
        die("$Model\nType: GSM");
    } else {
        die("$Model\nType: MEID");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
