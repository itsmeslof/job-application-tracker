<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/applications');
});

require __DIR__.'/web/profile.php';
require __DIR__.'/web/applications.php';
// require __DIR__.'/web/admin.php';
require __DIR__.'/auth.php';
