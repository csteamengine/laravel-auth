<!DOCTYPE html>
{{--@langrtl--}}
{{--    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">--}}
{{--@else--}}
{{--    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--@endlangrtl--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', config('analytics.SEO.default.description'))">
        <meta name="author" content="@yield('meta_author', 'Charlie Steenhagen')">
        <link rel="shortcut icon" href="/favicon.png" type="image/x-icon"/>
        <link rel="canonical" href="@yield('meta_canonical', 'https://kellydevittceramics.com')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css', 'laravel-auth')) }}
        @stack('after-styles')
    </head>
    <body>
        <div id="app">
            @include('LaravelAuth::includes.partials.logged-in-as')
            @include('LaravelAuth::frontend.includes.nav')

            <div class="container">
                @include('LaravelAuth::includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js', 'laravel-auth')) !!}
        {!! script(mix('js/vendor.js', 'laravel-auth')) !!}
        {!! script(mix('js/frontend.js', 'laravel-auth')) !!}
        @stack('after-scripts')

        @include('LaravelAuth::includes.partials.ga')
    </body>
</html>
