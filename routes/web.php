<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pokemon;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'pokemon',
], function(){
//    Route::get('data', [\App\Services\Implement\ApiService::class, 'getData'])->name('get');
    Route::get('data', [Pokemon::class, 'getData'])->name('get');
    Route::get('data/{id}', [Pokemon::class, 'getDataById'])->name('getbyId');
//    Route::get('workflows', [WorkflowController::class, 'indexAll'])->name('workflows.viewers.index');
//    Route::get('workflows/{uuid}/views', [WorkflowController::class, 'show'])->name('workflows.viewers.show');
});
