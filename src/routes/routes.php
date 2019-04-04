<?php
/**
 * Created by PhpStorm.
 * User: gregorysteenhagen
 * Date: 2019-02-17
 * Time: 07:17
 */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
