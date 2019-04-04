<?php

namespace Csteamengine\LaravelAuth\Listeners\Frontend\Auth;

use Carbon\Carbon;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        if ($event->user->timezone !== $geoip['timezone']) {
            // Update the users timezone
            $event->user->fill([
                'timezone' => $geoip['timezone'],
            ]);
        }

        $event->user->save();

        \Log::info('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        \Log::info('User Logged Out: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        \Log::info('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        \Log::info('User Provider Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed: '.$event->user->full_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Csteamengine\LaravelAuth\Events\Frontend\Auth\UserLoggedIn::class,
            'Csteamengine\LaravelAuth\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Frontend\Auth\UserLoggedOut::class,
            'Csteamengine\LaravelAuth\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Frontend\Auth\UserRegistered::class,
            'Csteamengine\LaravelAuth\Listeners\Frontend\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Frontend\Auth\UserProviderRegistered::class,
            'Csteamengine\LaravelAuth\Listeners\Frontend\Auth\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            \Csteamengine\LaravelAuth\Events\Frontend\Auth\UserConfirmed::class,
            'Csteamengine\LaravelAuth\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
        );
    }
}
