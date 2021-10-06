<?php

namespace App\Http\Controllers;

use MB;
use Illuminate\Http\Request;


// https://github.com/mgscreativa/mobbex-sdk-php
// composer require mobbex/sdk:0.1.0

class MobbexController extends Controller
{
    public  $API_KEY = '9u2ZVG2Jyj3WHdboDGWrM5IJRmk1kZt8eVcDWMf0';
    public  $API_ACCESS_TOKEN ='a1eee705-86be-45d9-8280-864914a1f63e';


    public function createCheckout()
    {

        $uniqid = uniqid();

        try {
            $mb = new MB($this->API_KEY, $this->API_ACCESS_TOKEN);
        } catch (Exception $e) {
            return $e->getMessage() . ' ' . $e->getCode();
        }
                
        $checkout_data = array(
            'total' => 100.5,
            'currency' => 'ARS',
            'description' => 'Checkout description',
            'return_url' => 'http://127.0.0.1:8000/mobbex-redirect',
            'reference' => $uniqid,
            // 'webhook' => 'http://127.0.0.1:8000/mobbex-custom-webhook-url',
            'redirect' => false,
            'test' => true, // True, testing, false, production
            'options' => array(
                'theme' => array(
                    'type' => 'light', // dark or light color scheme
                    'showHeader' => true,
                    'header' => array(
                        'name' => 'Your brand name',
                        'logo' => 'https://www.yourstore.com/store-logo.jpg', // Must be https!
                    ),
                ),
            ),
        );
        
        $result = $mb->mobbex_checkout($checkout_data);
        // print_r($result);
        return $result;
        // $result = $mb->get_transaction_status('TRANSACTION_ID');
        // print_r($result);
    }

    public function handleReturnUrl(Request $req){
                
        if($req->transactionId){
            
            $transactionDetails = $this->getTransactionDetails($req->transactionId);
            $result =  json_decode($transactionDetails);

            if($result->result){
                return ['result' => 'success', 'data' => $result ];
            }else{
                return ['result' => 'success', 'data' => $result];
            }

        }else{
            return $req;
        }

    }

    public function getTransactionDetails($transactionId){
        
        $url = "https://api.mobbex.com/2.0/transactions/status";
        $payload =  [ "id" => $transactionId];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-api-key: '. $this->API_KEY ,
            'x-access-token: '. $this->API_ACCESS_TOKEN)
        );
        
    
        $result = curl_exec($ch);

        curl_close($ch);
        
        return $result;
    }

}
