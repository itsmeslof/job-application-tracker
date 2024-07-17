<?php

use App\Http\Controllers\Application\ClosedController as ClosedApplicationController;
use App\Http\Controllers\Application\InProgressController as InProgressApplicationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/applications')->as('applications.')->group(function () {
    Route::get('/', [InProgressApplicationController::class, 'index'])
        ->name('index');
    
    Route::get('/create', [ApplicationController::class, 'create'])
        ->name('create');
    
    Route::get('/closed', [ClosedApplicationController::class, 'index'])
        ->name('closed');

    Route::post('/', [ApplicationController::class, 'store'])
        ->name('store');
    
    Route::get('/{application}', [ApplicationController::class, 'show'])
        ->name('show');
    
    Route::get('/{application}/edit', [ApplicationController::class, 'edit'])
        ->name('edit');
    
    Route::patch('/{application}', [ApplicationController::class, 'update'])
        ->name('update');
    
    Route::get('/{application}/close', [ClosedApplicationController::class, 'create'])
        ->name('close');
    
    Route::post('/{application}/close', [ClosedApplicationController::class, 'store']);
    
    Route::get('/{application}/open', [InProgressApplicationController::class, 'create'])
        ->name('open');
    
    Route::post('/{application}/open', [InProgressApplicationController::class, 'store']);
});
