<?php

namespace App\Providers;

use App\Models\address;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\category;
use App\Models\email;
use App\Models\subcategory;
use App\Models\main_menu;
use App\Models\phone;
use App\Models\socialmediaurl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        /*-----  share content code --*/
        $mainmenu = main_menu::where('post_status',1)->get();
        $category = category::where('post_status',1)->get();
        $subcategory = subcategory::where('post_status',1)->get();
        $social = socialmediaurl::where('post_status',1)->get();
        $phoneall = phone::where('post_status',1)->get();
        $emailall = email::where('post_status',1)->get();
        $address = address::where('post_status',1)->limit(1)->get();
        // social 
        $facebook = socialmediaurl::where('post_status',1)->where('social_mediaid','facebook')->get();
        $twitter = socialmediaurl::where('post_status',1)->where('social_mediaid','twitter')->get();
        $linkedin = socialmediaurl::where('post_status',1)->where('social_mediaid','linkedin')->get();
        $instagram = socialmediaurl::where('post_status',1)->where('social_mediaid','Instagram')->get();
        $youtube = socialmediaurl::where('post_status',1)->where('social_mediaid','youtube')->get();
        view()->share([
            'mainmenu' => $mainmenu,
            'category' => $category,
            'subcategory' => $subcategory,
            'social' => $social,
            'phoneall' => $phoneall,
            'emailall' => $emailall,
            'address' => $address,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'linkedin' => $linkedin,

        ]);

    
    }
}
