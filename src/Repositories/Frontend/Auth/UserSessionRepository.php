<?php

namespace Csteamengine\LaravelAuth\Repositories\Frontend\Auth;

use Csteamengine\LaravelAuth\Models\Auth\User;

/**
 * Class UserSessionRepository.
 */
class UserSessionRepository
{
    /**
     * @param User $user
     *
     * @return mixed
     */
    public function clearSessionExceptCurrent(User $user)
    {
        if (config('session.driver') == 'database') {
            return $user->sessions()
                ->where('id', '<>', session()->getId())
                ->delete();
        }

        // If session driver not database, do nothing
        return false;
    }
}
