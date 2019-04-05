@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link rel="stylesheet" href="/css/home.css">
@endpush

@section('content')

@endsection

@push('after-scripts')
    <script>
        $(window).ready( function(){
            var body = $('body');
            var image = '{{$background_image->image_url}}';
            var img = $('<img />').attr({
                'src': image,
            }).on('load', function() {
                body.css('background', 'url("'+image+'") center center fixed');
                body.css('background-size', 'cover');
            });
        });
    </script>
@endpush