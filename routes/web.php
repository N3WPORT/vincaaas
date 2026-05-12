<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrowthRecordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleRedirectController;
use App\Http\Controllers\KaderDashboardController;

/*
|--------------------------------------------------------------------------
| Root Redirect
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/dashboard');

});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect by Role
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->get('/dashboard', [

    RoleRedirectController::class,
    'index'

])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Shared Routes (Admin + Kader)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,kader'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Children
    |--------------------------------------------------------------------------
    */

    Route::resource('children', ChildController::class);

    /*
    |--------------------------------------------------------------------------
    | Growth Records
    |--------------------------------------------------------------------------
    */

    Route::resource('growth-records', GrowthRecordController::class);

    /*
    |--------------------------------------------------------------------------
    | Charts
    |--------------------------------------------------------------------------
    */

    Route::get('/charts', [

        ChartController::class,
        'index'

    ])->name('charts');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [

        DashboardController::class,
        'index'

    ])->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Mothers
    |--------------------------------------------------------------------------
    */

    Route::resource('mothers', MotherController::class);

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [

        ProfileController::class,
        'edit'

    ])->name('profile.edit');

    Route::patch('/profile', [

        ProfileController::class,
        'update'

    ])->name('profile.update');

    Route::delete('/profile', [

        ProfileController::class,
        'destroy'

    ])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Kader Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:kader'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Kader
    |--------------------------------------------------------------------------
    */

    Route::get('/kader/dashboard', [

        KaderDashboardController::class,
        'index'

    ])->name('kader.dashboard');

});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';