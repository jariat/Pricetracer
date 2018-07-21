<?php

use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Follow::class,500)->create();
    }

}