<?php

namespace Csteamengine\LaravelAuthHttp\Controllers\Frontend;

use Csteamengine\LaravelAuthHttp\Controllers\Controller;
use Csteamengine\LaravelAuth\Models\Auth\User;
use Csteamengine\LaravelAuth\Models\Image;

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
        $featured_user = User::where('is_featured', 1)->first();
        if(is_null($featured_user)){
            $featured_user = new User();
        }
        $image = $featured_user->background_image()->first();
        if(is_null($image)){
            $image = new Image();
        }
        return view('frontend.index', ['background_image' => $image]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $featured_user = User::where('is_featured', 1)->first();
        $image = $featured_user->about_image()->first();
        if(is_null($image)){
            $image = new Image();
        }
        return view('frontend.about')->with(['featured_user' => $featured_user, 'image' => $image]);
    }

    public function gallery()
    {
        //TODO add filters to narrow image results as well as pagination
        $functional = Image::where('is_active', true)->where('category_id', 1)->get();
        $sculptural = Image::where('is_active', true)->where('category_id', 2)->get();

        return view('frontend.gallery')->with(['functional' => $functional, 'sculptural' => $sculptural]);
    }
}
