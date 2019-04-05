<?php

namespace Csteamengine\LaravelAuth\Controllers\Frontend;

use Csteamengine\LaravelAuth\Controllers\Controller;
use Csteamengine\LaravelAuth\Models\Auth\User;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('LaravelAuth::frontend.index');
    }
}
