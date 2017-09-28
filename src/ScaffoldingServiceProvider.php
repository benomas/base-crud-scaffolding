<?php namespace Benomas\BcScaffolding;

use Illuminate\Support\ServiceProvider;
use Benomas\BcScaffolding\Commands\ScaffoldCommand;

class BcScaffoldingServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['BcScaffolding.scaffold'] = $this->app->share(function($app)
        {
            return new BcScaffoldingCommand();
        });

        $this->commands('bcscaffolding.scaffold');
	}
}
