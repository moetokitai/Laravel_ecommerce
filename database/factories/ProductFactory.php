<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(3),
        'image'=>'sample.jpg',
        'description'=>$faker->paragraph(2),
        'price'=>$faker->numberBetween(100,10000),

    ];
});
