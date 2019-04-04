<?php

namespace Csteamengine\LaravelAuth\Listeners\Backend;

/**
 * Class ProjectEventListener.
 */
class ProjectEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Project Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Project Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Project Deleted');
    }


    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        \Log::info('User Password Changed');
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('Project Deactivated');
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('Project Reactivated');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('Project Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('Project Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Project\ProjectCreated::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Project\ProjectEventListener@onCreated'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Project\ProjectUpdated::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Project\ProjectEventListener@onUpdated'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Backend\Project\ProjectDeleted::class,
            'Csteamengine\LaravelAuth\Listeners\Backend\Project\ProjectEventListener@onDeleted'
        );

//        $events->listen(
//            \Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserDeactivated::class,
//            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\User\UserEventListener@onDeactivated'
//        );
//
//        $events->listen(
//            \Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserReactivated::class,
//            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\User\UserEventListener@onReactivated'
//        );
//
//        $events->listen(
//            \Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserSocialDeleted::class,
//            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\User\UserEventListener@onSocialDeleted'
//        );
//
//        $events->listen(
//            \Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserPermanentlyDeleted::class,
//            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\User\UserEventListener@onPermanentlyDeleted'
//        );
//
//        $events->listen(
//            \Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserRestored::class,
//            'Csteamengine\LaravelAuth\Listeners\Backend\Auth\User\UserEventListener@onRestored'
//        );
    }
}
