<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-swagger', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('l5-swagger:generate');

    return response(Artisan::output());
});
Route::get('/clear-cache', function() {

    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('session:table');
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('l5-swagger:generate');


    return 'FINISHED';

});
