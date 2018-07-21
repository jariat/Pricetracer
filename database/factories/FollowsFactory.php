<?php

$factory->define(App\Follow::class, function () {
    $users= \App\User::all()->pluck('id')->toArray();

    return [
        'follower' => array_random($users),
        'followee' => array_random($users),
    ];
});