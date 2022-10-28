<?php

namespace App\Services\SMS;

trait MesgatSMS
{

    function sendSMS($phone,$msg)
    {
        $phone='966'.$phone;
        $ch = curl_init(config('msegat.msegat_url'));
        $data = array(
            'userName'=>config('msegat.userName'),
            'apiKey' => config('msegat.apiKey'),
            'numbers' => $phone,
            'userSender' => 'OTP',
            'msg' => $msg
        );
        $response_data = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //Execute the request
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        return $result;

    }


}
