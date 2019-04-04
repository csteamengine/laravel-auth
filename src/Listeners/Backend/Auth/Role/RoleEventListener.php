<?php

namespace Csteamengine\LaravelAuth\Listeners\Backend\Auth\Role;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Role Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Role Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Role Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Auth\Role\RoleCreated::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Auth\Role\RoleUpdated::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Auth\Role\RoleDeleted::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\Role\RoleEventListener@onDeleted'
        );
    }
}
