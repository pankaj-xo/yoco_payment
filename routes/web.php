<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YocoController;
use App\Http\Controllers\MobbexController;
use App\Http\Controllers\PointCheckoutController;

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
Route::get('/', function(){
    return view("yoco.index");
});
Route::post('/yoco',[YocoController::class,'charge']);


//##############  POINT ###############

// Route::get('/', function(){
//     return view("point.index");
// });
// Route::get('/pointpayment/payment-redirect/',[PointCheckoutController::class,'handleRedirect']);
// Route::get('/pointpayment/checkoutinfo',[PointCheckoutController::class,'getCheckoutInfo']);
// Route::post('/pointpayment', [PointCheckoutController::class,"createCheckout"]);


//##############  MOBBEX ###############

// Route::get("/",[MobbexController::class,'createCheckout']);
// Route::get("/mobbex-redirect",[MobbexController::class,'handleReturnUrl']);
