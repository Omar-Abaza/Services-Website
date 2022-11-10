<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer("front.partials.header",function($view){
            $view->with("setting",Setting::first());

        });

        view()->composer("front.partials.footer",function($view){
            $view->with("setting",Setting::first());
            $view->with("services",Service::select("id", "name", "image")->get());
        });

        view()->composer("front.partials.blocks.navigation",function($view){
            $view->with("services",Service::select("id", "name", "image")->get());
        });

        view()->composer("front.partials.blocks.facts-counter",function($view ){
            $view->with("projects_count",Project::count());
            $view->with("services_count",Service::count());
            $view->with("events_count",Event::count());
        });

        view()->composer("admin.index",function($view){
            $view->with("projects",Project::get());
            $view->with("services",Service::get());
            $view->with("events",Event::get());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
