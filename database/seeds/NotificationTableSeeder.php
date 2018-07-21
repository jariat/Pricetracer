<?php
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Notification::class,500)->create();
    }

}