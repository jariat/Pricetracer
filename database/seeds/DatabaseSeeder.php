<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(FollowTableSeeder::class);
        Model::reguard();
    }
}
