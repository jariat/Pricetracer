<?php
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    static $image = '/products/Samsung-Galaxy-S6-0.jpg';
    $categories= \App\Category::all()->pluck('id')->toArray();

    return [
        'image' => $image,
        'price' => $faker->numberBetween(1000,100000),
        'quantity' => $faker->numberBetween(1,100),
        'name'=> $faker->name,
        'category_id'=>array_random($categories),


    ];
});