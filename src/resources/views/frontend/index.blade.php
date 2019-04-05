@extends('LaravelAuth::frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')

@endpush

@section('content')
    <h1>Hello</h1>
@endsection
