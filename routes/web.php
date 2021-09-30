<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YocoController;
use App\Http\Controllers\MobbexController;
use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

##############  YOCO ###############
// Route::get('/', function(){
//     return view("yoco.index");
// });
// Route::post('/yoco',[YocoController::class,'charge']);


//##############  POINT ###############

// Route::get('/', function(){
//     return view("point.index");
// });

// Route::get('/pointpayment/payment-redirect/',function (Request $req){
//     return view('point.index',['webhookResult' => $req->all()]);
// });

// Route::get('/pointpayment/checkoutinfo',function(){
    
//     if(!request()->id){
//         return ['ERROR' => 'checkout "ID" is not present.'];
//     }else{
//         // 
//         $curl = curl_init();

//         curl_setopt_array($curl, array(
//           CURLOPT_URL => 'https://api.test.pointcheckout.com/mer/v2.0/checkout/1711695471482116930',
//           CURLOPT_RETURNTRANSFER => true,
//           CURLOPT_ENCODING => '',
//           CURLOPT_MAXREDIRS => 10,
//           CURLOPT_TIMEOUT => 0,
//           CURLOPT_FOLLOWLOCATION => true,
//           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//           CURLOPT_CUSTOMREQUEST => 'GET',
//           CURLOPT_HTTPHEADER => array(
//             'Content-Type: application/json',
//             'X-PointCheckout-Api-Key: 17955fdeffc6dece',
//             'X-PointCheckout-Api-Secret: mer_44a87e0139c1c5a670b2e4d95aa4b3a96023382dec8ea22ed847c9a7c41d4095'
//           ),
//         ));
        
//         $response = curl_exec($curl);
        
//         curl_close($curl);
//         return $response;

//     }
// });

// Route::post('/pointpayment', function(Request $req){

//     $payload = '{
//         "requestId": "CHK-1000214-r10",
//         "orderId": "CHK-100000214",
//         "currency": "AED",
//         "amount": 100,
//         "totals": {
//           "subtotal": 100,
//           "tax": 5,
//           "shipping": 3,
//           "handling": 2,
//           "discount": 10,
//           "skipTotalsValidation": false
//         },
//         "items": [
//           {
//             "name": "Dark grey sunglasses",
//             "sku": "1116521",
//             "unitprice": 50,
//             "quantity": 2,
//             "linetotal": 100
//           }
//         ],
//         "customer": {
//           "id": "123456",
//           "firstName": "John",
//           "lastName": "Doe",
//           "email": "John@Doe.com",
//           "phone": "911"
//         },
//         "billingAddress": {
//           "name": "[NAME]",
//           "address1": "[ADDRESS 1]",
//           "address2": "[ADDRESS 2]",
//           "city": "[CITY]",
//           "state": "[STATE]",
//           "zip": "12345",
//           "country": "AED"
//         },
//         "deliveryAddress": {
//           "name": "[NAME]",
//           "address1": "[ADDRESS 1]",
//           "address2": "[ADDRESS 2]",
//           "city": "[CITY]",
//           "state": "[STATE]",
//           "zip": "12345",
//           "country": "AED"
//         },
//         "returnUrl": "http://127.0.0.1:8000/pointpayment/payment-redirect/",
//         "branchId": 0,
//         "allowedPaymentMethods": [
//           "CARD"
//         ],
//         "defaultPaymentMethod": "CARD",
//         "language": "EN"
//       }';


   
    
    
//     // Prepare new cURL resource
   
//     $ch = curl_init('https://api.test.pointcheckout.com/mer/v2.0/checkout/web');
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//     // Set HTTP Header for POST request 

//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//             'Content-Type: application/json',
//             'X-PointCheckout-Api-Key: 17955fdeffc6dece',
//             'X-PointCheckout-Api-Secret: mer_44a87e0139c1c5a670b2e4d95aa4b3a96023382dec8ea22ed847c9a7c41d4095')
//         );
    
//     // Submit the POST request
//     $result = curl_exec($ch);

//     // Close cURL session handle
//     curl_close($ch);
    
//     return view('point.index',['paymentSession' => $result]);

// });





//##############  POINT ###############
// Route::get("/",function(){
//   return view('mobbex.index');
// });

Route::get("/",[MobbexController::class,'createCheckout']);

Route::get("/mobbex-redirect",[MobbexController::class,'handleReturnUrl']);








