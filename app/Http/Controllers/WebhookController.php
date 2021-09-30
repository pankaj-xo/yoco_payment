<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(){
        return "OKOKOK";
    } 

    public function handlePost(Request $request){
        return [
            "req" => $request,
            'Hook' => "OK",
        ];
    } 
    
}
