<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\FoodsController;
use App\Http\Controllers\MealsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    try {
        DB::connection()->getPdo();
        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }
    return view('welcome');
})->middleware(['auth']);

Route::post('users/{user}/meals', [MealsController::class, 'store'])->middleware(['auth']);

Route::resource('meals', MealsController::class)->middleware(['auth']);

Route::resource('meals.foods', FoodsController::class)->middleware(['auth']);

// Route::post('meals/{meal}/foods', [FoodsController::class, 'store'])->middleware(['auth']);

// Route::delete('meals/{meal}/foods/{food}', [FoodsController::class, 'destroy'])->middleware(['auth']);