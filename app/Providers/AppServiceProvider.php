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

		View::composer('theater.partials.model-form', 'App\Http\ViewComposers\TheaterViewComposer@modelForm');
		View::composer('theater.show', 'App\Http\ViewComposers\TheaterViewComposer@show');
		View::composer('theater.index', 'App\Http\ViewComposers\TheaterViewComposer@index');

		View::composer('subscription.partials.model-form', 'App\Http\ViewComposers\SubscriptionViewComposer@modelForm');
		View::composer('subscription.show', 'App\Http\ViewComposers\SubscriptionViewComposer@show');
		View::composer('subscription.index', 'App\Http\ViewComposers\SubscriptionViewComposer@index');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Entities\Retailer\RetailerInterface', 'App\Entities\Retailer\DbRetailerRepository');
		$this->app->bind('App\Entities\Theater\TheaterInterface', 'App\Entities\Theater\DbTheaterRepository');
		$this->app->bind('App\Entities\Subscription\SubscriptionInterface', 'App\Entities\Subscription\DbSubscriptionRepository');
	}

}
