<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\App\IndexComponent;


Route::get('/', IndexComponent::class)->name('website');

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
});

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
