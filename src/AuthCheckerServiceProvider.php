<?php

namespace SureShinde\AuthChecker;

use Illuminate\Events\Dispatcher;
use SureShinde\MobileDesktopDetect\AgentServiceProvider;
use SureShinde\AuthChecker\Services\AuthChecker;
use SureShinde\AuthChecker\Subscribers\AuthCheckerSubscriber;

/**
 * Class AuthCheckerServiceProvider
 *
 * @package SureShinde\AuthChecker
 */
class AuthCheckerServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/auth-checker.php' => config_path('auth-checker.php')
        ], 'auth-checker');

        if ($this->app->runningInConsole()) {
            if (false === class_exists('CreateLoginsTable') && false === class_exists('CreateDevicesTable')) {
                $this->publishes([
                    __DIR__.'/../migrations/create_devices_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_devices_table.php'),
                    __DIR__.'/../migrations/create_logins_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_logins_table.php')
                ], 'auth-checker');
            }

            if (false === class_exists('UpdateLoginsAndDevicesTableUserRelation')) {
                $this->publishes([
                    __DIR__.'/../migrations/update_logins_and_devices_table_user_relation.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_update_logins_and_devices_table_user_relation.php'),
                ], 'auth-checker');
            }
        }

        $this->mergeConfigFrom(__DIR__.'/../config/auth-checker.php', 'auth-checker');

        $this->loadTranslationsFrom(__DIR__.'/../lang/', 'auth-checker');

        /** @var Dispatcher $dispatcher */
        $dispatcher = $this->app['events'];
        $dispatcher->subscribe(AuthCheckerSubscriber::class);
    }

    public function register(): void
    {
        $this->app->singleton(AuthChecker::class, function ($app) {
            return new AuthChecker($app, $app['request']);
        });

        $this->app->alias(AuthChecker::class, 'authchecker');

        $this->app->register(AgentServiceProvider::class);
    }
}
