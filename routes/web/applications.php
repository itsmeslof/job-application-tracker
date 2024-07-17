<?php

use App\Http\Controllers\Application\ClosedController as ClosedApplicationController;
use App\Http\Controllers\Application\InProgressController as InProgressApplicationController;
use App\Http\Controllers\Application\DeleteController as DeleteApplicationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationEventController;
use App\Http\Controllers\ApplicationEvent\DeleteController as DeleteApplicationEventController;
use App\Models\Application;
use App\Models\ApplicationEvent;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/applications')->as('applications.')->group(function () {
    Route::get('/', [InProgressApplicationController::class, 'index'])->name('index');
    Route::post('/', [ApplicationController::class, 'store'])->name('store');
    Route::get('/closed', [ClosedApplicationController::class, 'index'])->name('closed');
    Route::get('/create', [ApplicationController::class, 'create'])->name('create');
    
    Route::prefix('/{application}')->group(function () {
        Route::get('/', [ApplicationController::class, 'show'])->name('show');
        
        Route::get('/edit', [ApplicationController::class, 'edit'])->name('edit');
        Route::patch('/', [ApplicationController::class, 'update'])->name('update');

        Route::get('/delete', [DeleteApplicationController::class, 'show'])->name('delete');
        Route::delete('/', [ApplicationController::class, 'destroy'])->name('destroy');
        
        Route::get('/close', [ClosedApplicationController::class, 'create'])->name('close');
        Route::post('/close', [ClosedApplicationController::class, 'store']);

        Route::get('/open', [InProgressApplicationController::class, 'create'])->name('open');
        Route::post('/open', [InProgressApplicationController::class, 'store']);

        // ApplicationEvents
        Route::prefix('/events')->as('events.')->group(function () {
            Route::get('/create', [ApplicationEventController::class, 'create'])->name('create');
            Route::post('/', [ApplicationEventController::class, 'store'])->name('store');

            Route::prefix('/{event}')->group(function () {
                Route::get('/', function (Application $application, ApplicationEvent $event) {
                    return to_route('applications.events.edit', [$application, $event]);
                });
                Route::get('/edit', [ApplicationEventController::class, 'edit'])->name('edit');
                Route::patch('/', [ApplicationEventController::class, 'update'])->name('update');
                Route::get('/delete', [DeleteApplicationEventController::class, 'show'])->name('delete');
                Route::delete('/', [ApplicationEventController::class, 'destroy'])->name('destroy');
            });
        });
    });
});
