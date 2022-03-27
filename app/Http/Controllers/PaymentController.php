<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }
    //
    public function pay(Request $request){
        $paymentPlatform = $this->paymentPlatformResolver->resolveService("paypal");
        session()->put('paymentPlatformId',"paypal");
        // if($request->user()->hasActiveSubscription()){
        //     $request->value = round($request->value * 0.9, 2);
        // }
        return $paymentPlatform->handlePayment($request);
    }
}
