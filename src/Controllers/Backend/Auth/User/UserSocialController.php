<?php

namespace Csteamengine\LaravelAuth\Controllers\Backend\Auth\User;

use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Models\Auth\SocialAccount;
use Csteamengine\LaravelAuth\Controllers\Controller;
use Csteamengine\LaravelAuth\Requests\Backend\Auth\User\ManageUserRequest;
use Csteamengine\LaravelAuth\Repositories\Backend\Access\User\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SocialRepository  $socialRepository
     * @param User              $user
     * @param SocialAccount     $social
     *
     * @return mixed
     * @throws \Csteamengine\LaravelAuth\Exceptions\GeneralException
     */
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
