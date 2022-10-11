<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\App\IndexComponent;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', IndexComponent::class)->name('website');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
