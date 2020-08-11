<?php

use HorizonPanel\Models\PaymentMethods;
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
        PaymentMethods::create(['name' => 'PayPal_Express']); // Register PayPal

        PaymentMethods::create(['name' => 'Stripe']); // Register Stripe
    }
}
