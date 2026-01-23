<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\ProfileController;
use App\Models\Kategori;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\HomeController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/events/{event}', [UserEventController::class, 'show'])->name('events.show');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home', [
        'categories' => Kategori::all(),
        'events' => Event::all(),
    ]);
})->name('home');

Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');
Route::get('/events/{id}', [PublicEventController::class, 'show'])
    ->name('events.show');
/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::resource('categories', CategoryController::class);
            Route::resource('events', EventController::class);
            Route::resource('tickets', TiketController::class);

            Route::get('/histories', [HistoriesController::class, 'index'])
                ->name('histories.index');

            Route::get('/histories/{id}', [HistoriesController::class, 'show'])
                ->name('histories.show');
        });
});

require __DIR__ . '/auth.php';
