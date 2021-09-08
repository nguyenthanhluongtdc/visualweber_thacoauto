<?php

namespace Platform\Kernel\Providers;

use Illuminate\Support\ServiceProvider;

use Platform\Base\Supports\Helper;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Platform\Blog\Models\Post;
use Platform\Kernel\Http\Middleware\AssetEditorMiddleware;
use Platform\Kernel\Repositories\Caches\PostCacheDecorator;
use Platform\Kernel\Repositories\Eloquent\PostRepository;
use Platform\Kernel\Repositories\Interfaces\PostInterface;

class KernelServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('router')->pushMiddlewareToGroup('web', AssetEditorMiddleware::class);
    }

    public function boot()
    {
        $this->app->bind(PostInterface::class, function () {
            return new PostCacheDecorator(new PostRepository(new Post));
        });

        // Helper::autoload(__DIR__ . '/../../helpers');
    }
}
