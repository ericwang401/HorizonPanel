<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Packages;
use Faker\Generator as Faker;

$factory->define(Packages::class, function (Faker $faker) {
    return [
        'title' => 'HorizonPanel Monthly License'
    ];
});
