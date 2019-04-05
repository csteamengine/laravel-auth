<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <a href="{{ route('frontend.index') }}" class="navbar-brand font-4xl">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li class="nav-item"><a href="{{route('frontend.index')}}" class="nav-link {{ active_class(Active::checkUriPattern('/')) }}">Home</a></li>

            {{--<li class="nav-item"><a href="{{route('frontend.shop')}}" class="nav-link {{ active_class(Active::checkUriPattern('shop*')) }}">Shop</a></li>--}}

            <li class="nav-item"><a href="{{route('frontend.projects')}}" class="nav-link {{ active_class(Active::checkUriPattern('projects*')) }}">Projects</a></li>

            <li class="nav-item"><a href="{{route('frontend.about')}}" class="nav-link {{ active_class(Active::checkUriPattern('about*')) }}">About</a></li>

            {{--<li class="nav-item"><a href="{{route('frontend.cart')}}" class="nav-link {{ active_class(Active::checkUriPattern('cart*')) }}">Cart</a></li>--}}

            @if(config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>

                    @include('includes.partials.lang')
                </li>
            @endif

            {{--@auth--}}
                {{--<li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkUriPattern('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>--}}
            {{--@endauth--}}

            {{--@guest--}}
                {{--<li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkUriPattern('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>--}}

                {{--@if(config('access.registration'))--}}
                    {{--<li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkUriPattern('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>--}}
                {{--@endif--}}
            {{--@else--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"--}}
                       {{--aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>--}}

                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">--}}
                        {{--@can('view backend')--}}
                            {{--<a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>--}}
                        {{--@endcan--}}

                        {{--<a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>--}}
                        {{--<a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--@endguest--}}

            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">@lang('navs.frontend.contact')</a></li>

            <li class="nav-item navbar-icons">
                <a href="https://www.facebook.com/devitt.kelly" class="nav-link" target="_blank">
                    <img class="header-icon" src="/img/frontend/icons/facebookBlack.png" alt="Facebook" />
                </a>
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                <a href="https://www.instagram.com/kelly.devitt" class="nav-link" target="_blank">
                    <img class="header-icon" src="/img/frontend/icons/instagramBlack.png" alt="Instagram"/>
                </a>
            </li>
        </ul>
    </div>
</nav>