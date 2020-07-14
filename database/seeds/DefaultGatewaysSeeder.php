<?php

use App\PaymentMethods;
use Illuminate\Database\Seeder;

class DefaultGatewaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethods::create(['gateway' => 'PayPal_Express']); // Register PayPal

        PaymentMethods::create(['gateway' => 'Stripe']); // Register Stripe
    }
}
