<?php

namespace Database\Seeders;

use App\Models\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PaymentPlatform::create([
            'nombre'=>'Paypal',
            'logo'=>'img/payment-platforms/paypal.png',
        ]);
        PaymentPlatform::create([
            'nombre'=>'Stripe',
            'logo'=>'img/payment-platforms/paypal.png',
        ]);
        PaymentPlatform::create([
            'nombre'=>'MercadoPago',
            'logo'=>'img/payment-platforms/paypal.png',
        ]);
        PaymentPlatform::create([
            'nombre'=>'PayU',
            'logo'=>'img/payment-platforms/paypal.png',
        ]);
    }
}
