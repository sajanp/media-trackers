<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer('retailer.partials.model-form', 'App\Http\ViewComposers\RetailerViewComposer@modelForm');
		View::composer('retailer.show', 'App\Http\ViewComposers\RetailerViewComposer@show');
		View::composer('retailer.index', 'App\Http\ViewComposers\RetailerViewComposer@index');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Entities\Retailer\RetailerInterface', 'App\Entities\Retailer\DbRetailerRepository');
	}

}
