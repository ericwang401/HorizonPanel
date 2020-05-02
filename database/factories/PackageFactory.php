<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Packages;
use Faker\Generator as Faker;

$factory->define(Packages::class, function (Faker $faker) {
    return [
        'category_id' => factory(App\PackageCategory::class),
        'title' => $faker->title(),
        'description' => $faker->paragraph()
    ];
});
