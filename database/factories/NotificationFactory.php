<?php
use Faker\Generator as Faker;
$factory->define(App\Notification::class, function (Faker $faker) {
    $users= \App\User::all()->pluck('id')->toArray();

    return [
        'title' => $faker->streetName,
        'message' => $faker->sentence,
        'user_id' => array_random($users)
    ];
});