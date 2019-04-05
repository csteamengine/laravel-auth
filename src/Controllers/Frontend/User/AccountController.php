<?php

namespace Csteamengine\LaravelAuth\Controllers\Frontend\User;

use Csteamengine\LaravelAuth\Controllers\Controller;
use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Models\System\Session;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }
}
