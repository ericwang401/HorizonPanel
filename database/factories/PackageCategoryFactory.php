<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PackageCategory;
use Faker\Generator as Faker;

$factory->define(PackageCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => 'Horizon Apache hosting is hosted on the most finest and powerful servers on the market. Our specifications are Ryzen 69 4200x, 420 GB RAM, and 69 PB NVME SSD.'
    ];
});
