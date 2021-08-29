<?php


namespace Platform\Comment\Providers;

use Platform\Comment\Events\NewCommentEvent;
use Platform\Comment\Listeners\NewCommentListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewCommentEvent::class => [
            NewCommentListener::class,
        ],
    ];
}
