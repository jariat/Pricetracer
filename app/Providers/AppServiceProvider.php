<?php

namespace App\Providers;

use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(['layouts.app'],
            function($view)
            {
                $user = Auth::user();
                $userAvatar =  User::findOrFail($user->id)->avatar;
                $userNotifications = Notification::where(['user_id'=> $user->id,'new'=>true])->get();

                $user_title = $user->is_admin?'Administrator':'Wholesaler';

                $avatar = $userAvatar?$userAvatar: 'images/avatar-d.png';
                $view->with(compact('avatar','userNotifications','user_title','user'));
            });
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
