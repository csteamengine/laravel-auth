<?php

namespace Csteamengine\LaravelAuth\Controllers\Backend;

use Csteamengine\LaravelAuth\Controllers\Controller;
use Route;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }
}
