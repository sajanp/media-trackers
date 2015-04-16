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

		View::composer('title.partials.model-form', 'App\Http\ViewComposers\TitleViewComposer@modelForm');
		View::composer('title.edit', 'App\Http\ViewComposers\TitleViewComposer@modelForm');
		View::composer('title.movie.show', 'App\Http\ViewComposers\MovieViewComposer@show');
		View::composer('title.movie.index', 'App\Http\ViewComposers\MovieViewComposer@index');
		View::composer('title.movie.purchase.create', 'App\Http\ViewComposers\MovieViewComposer@purchaseCreate');
		View::composer('title.tv.show', 'App\Http\ViewComposers\TVViewComposer@show');
		View::composer('title.tv.index', 'App\Http\ViewComposers\TVViewComposer@index');

		View::composer('purchase.partials.model-form', 'App\Http\ViewComposers\PurchaseViewComposer@modelForm');
		View::composer('purchase.show', 'App\Http\ViewComposers\PurchaseViewComposer@show');
		View::composer('purchase.index', 'App\Http\ViewComposers\PurchaseViewComposer@index');

		View::composer('purchase.purchaseable.edit', 'App\Http\ViewComposers\PurchaseableViewComposer@edit');
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
		$this->app->bind('App\Entities\Title\TitleInterface', 'App\Entities\Title\DbTitleRepository');
		$this->app->bind('App\Entities\Purchase\PurchaseInterface', 'App\Entities\Purchase\DbPurchaseRepository');
		$this->app->bind('App\Entities\Format\FormatInterface', 'App\Entities\Format\DbFormatRepository');
		$this->app->bind('App\Entities\Ultraviolet\UltravioletInterface', 'App\Entities\Ultraviolet\DbUltravioletRepository');
	}

}
