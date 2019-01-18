<?php

namespace Pixney\DigitaloceanModule;

use Illuminate\Routing\Router;
use Pixney\DigitaloceanModule\Snapshot\SnapshotModel;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Pixney\DigitaloceanModule\Snapshot\SnapshotRepository;
use Pixney\DigitaloceanModule\Snapshot\Contract\SnapshotRepositoryInterface;
use Anomaly\Streams\Platform\Model\Digitalocean\DigitaloceanSnapshotsEntryModel;

class DigitaloceanModuleServiceProvider extends AddonServiceProvider
{
    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
        'admin/digitalocean'                                       => 'Pixney\DigitaloceanModule\Http\Controller\Admin\SnapshotsController@index',
        'admin/digitalocean/refresh'                               => 'Pixney\DigitaloceanModule\Http\Controller\Admin\SnapshotsController@refresh',
        'admin/digitalocean/droplets/get'                          => 'Pixney\DigitaloceanModule\Http\Controller\Admin\SnapshotsController@getDroplets',
        'admin/digitalocean/snapshot/delete/{id}'                  => 'Pixney\DigitaloceanModule\Http\Controller\Admin\SnapshotsController@delete',
        'admin/digitalocean/snapshot/create/{dropletId}'           => 'Pixney\DigitaloceanModule\Http\Controller\Admin\SnapshotsController@create',
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        //Pixney\DigitaloceanModule\Http\Middleware\ExampleMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Pixney\DigitaloceanModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //Pixney\DigitaloceanModule\Event\ExampleEvent::class => [
        //    Pixney\DigitaloceanModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Pixney\DigitaloceanModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        DigitaloceanSnapshotsEntryModel::class => SnapshotModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        SnapshotRepositoryInterface::class => SnapshotRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }
}
