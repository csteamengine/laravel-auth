<?php

namespace Csteamengine\LaravelAuth\Repositories\Backend\Access\User;

use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Models\Auth\SocialAccount;
use Csteamengine\LaravelAuth\Exceptions\GeneralException;
use Csteamengine\LaravelAuth\Events\Backend\Auth\User\UserSocialDeleted;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.access.users.social_delete_error'));
    }
}
