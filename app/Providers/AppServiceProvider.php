<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\admin\theLoaiModel;
use App\Models\admin\sanphamModel;
use App\ThuvienApp\cartShopping;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Paginator::useBootstrap();
        view()->composer('*',function($view){
                $view->with([
                    'dataTheloai'=>theLoaiModel::all(),
                    'data_menu'=>theLoaiModel::where('id_cha',0)->with('children')->get()->toArray(),
                    
                    'cartShopping'=>new cartShopping()

                ]);

        });
   

    }





}
