<?php

class ClassChecker
{
    public function GetModelInfo($imei)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://iservices-dev.us/MyCheckAldazActivatorNEW/mymodelbot.php?imei=$imei",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('imei' => $imei),
        ));
        $curlResponse = curl_exec($curl);
        curl_close($curl);
        /*$curlResponse = strip_tags($curlResponse);
        $curlResponse = trim(strip_tags($curlResponse)); // Eliminar espacios y saltos de línea
        */
        return $curlResponse;
    }

    public function GetModelNumberID($Model)
    {
        if (preg_match('/\((.*?)\)/', $Model, $coincidencias)) {
            
            $ModeloEncontrado = $coincidencias[1];

            return $ModeloEncontrado;
            
        }
    }

    public function CheckItsGSM($ModelNumber)
    {
        $gsmModels = ["A1778", "A1784", "A1905", "A1901", "A1897"];
        
        if (in_array($ModelNumber, $gsmModels)) {
            return "GSM";
        }
    
        return "xd";
    }
    
}



?>