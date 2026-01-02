<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pokemon;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'pokemon',
], function(){
    Route::get('index', [Pokemon::class, 'index'])->name('index');
    Route::get('sync', [Pokemon::class, 'sync'])->name('sync');

});
