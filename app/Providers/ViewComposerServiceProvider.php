<?php namespace Learn\Providers;


use Illuminate\Support\ServiceProvider;
class ViewComposerServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin/parts/*', 'Learn\Http\Composers\AdminPartsComposer');
        view()->composer('front/parts/*', 'Learn\Http\Composers\FrontPartsComposer');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}