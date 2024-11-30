<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraaEdgeController extends Controller
{
    function extraaEdgePushBasicData($data)
    {
        $curl = curl_init();

        // Convert the data array to JSON string
        $jsonData = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://thirdpartyapi.extraaedge.com/api/SaveRequest',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
