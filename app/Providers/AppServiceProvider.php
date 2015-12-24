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

		View::composer('movie.partials.model-form', 'App\Http\ViewComposers\MovieViewComposer@modelForm');
		View::composer('movie.edit', 'App\Http\ViewComposers\MovieViewComposer@modelForm');
		View::composer('movie.show', 'App\Http\ViewComposers\MovieViewComposer@show');
		View::composer('movie.index', 'App\Http\ViewComposers\MovieViewComposer@index');
		View::composer('movie.purchase.create', 'App\Http\ViewComposers\MovieViewComposer@purchaseCreate');

		View::composer('purchase.partials.model-form', 'App\Http\ViewComposers\PurchaseViewComposer@modelForm');
		View::composer('purchase.show', 'App\Http\ViewComposers\PurchaseViewComposer@show');
		View::composer('purchase.index', 'App\Http\ViewComposers\PurchaseViewComposer@index');

		View::composer('purchase.purchaseable.edit', 'App\Http\ViewComposers\PurchaseableViewComposer@edit');

		View::composer('rental.index', 'App\Http\ViewComposers\RentalViewComposer@index');
		View::composer('rental.partials.model-form', 'App\Http\ViewComposers\RentalViewComposer@modelForm');
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
		$this->app->bind('App\Entities\Movie\MovieInterface', 'App\Entities\Movie\DbMovieRepository');
		$this->app->bind('App\Entities\Purchase\PurchaseInterface', 'App\Entities\Purchase\DbPurchaseRepository');
		$this->app->bind('App\Entities\Format\FormatInterface', 'App\Entities\Format\DbFormatRepository');
		$this->app->bind('App\Entities\Ultraviolet\UltravioletInterface', 'App\Entities\Ultraviolet\DbUltravioletRepository');
		$this->app->bind('App\Entities\Rental\RentalInterface', 'App\Entities\Rental\DbRentalRepository');
	}

}
