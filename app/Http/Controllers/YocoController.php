<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YocoController extends Controller
{
    public $secret_key = 'sk_test_8287293fJDRMNK4d4e0425ca1478';

    public function charge (Request $req){

        $token = $req->id;
        
        if(!$token){
            return [ 'error' => "TOKEN IN NOT PRESENT" ];
        }
    
    
        $data = [
            'token' => $token,
            'amountInCents' => 2499, 
            'currency' => 'ZAR',
            'metadata' =>  '{
                "test": "test",
                "test1": "test1",
                "test2": "test3"
            }'
        ];


       $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secret_key . ":");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // send to yoco
        $result = curl_exec($ch);
        return $result;
     
  
        
    } 

}
