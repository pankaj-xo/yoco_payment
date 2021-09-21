<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YocoController extends Controller
{

    public function charge (Request $req){

        $token = $req->id;
        
        if(!$token){
            return [ 'error' => "TOKEN IN NOT PRESENT" ];
        }
    
    
        $data = [
            'token' => $token,
            'amountInCents' => 2499, 
            'currency' => 'ZAR' 
        ];

        $secret_key = 'sk_test_8287293fJDRMNK4d4e0425ca1478';

        // Initialise the curl handle
        $ch = curl_init();

        // Setup curl
        curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        // Basic Authentication method
        // Specify the secret key using the CURLOPT_USERPWD option
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // send to yoco
        $result = curl_exec($ch);
        return $result;
     
  
        
    } 


    public function old_charge (Request $req){

        
        $token = $req->id; 
    
    
        $data = [
            'token' => $token,
            'amountInCents' => 2799, 
            'currency' => 'ZAR' 
        ];

        $secret_key = 'sk_test_8287293fJDRMNK4d4e0425ca1478';

        // Initialise the curl handle
        $ch = curl_init();

        // Setup curl
        curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        // Basic Authentication method
        // Specify the secret key using the CURLOPT_USERPWD option
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // send to yoco
        $result = curl_exec($ch);
        return $result;
     
  
        
    } 






}
