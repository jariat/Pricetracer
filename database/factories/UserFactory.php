<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $categories= \App\Category::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'is_retailer' =>$faker->boolean,
        'is_wholesaler' => $faker->boolean,
        'is_admin' => $faker->boolean,
        'category_id'=>array_random($categories),
        'longitude'=>$faker->longitude,
        'latitude'=>$faker->latitude,

    ];
});
