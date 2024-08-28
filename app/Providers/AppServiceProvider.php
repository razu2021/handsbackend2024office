<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\category;
use App\Models\subcategory;
use App\Models\main_menu;

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

        view()->share('mainmenu',$mainmenu);
        view()->share('category',$category);
        view()->share('subcategory',$subcategory);

    
    }
}
