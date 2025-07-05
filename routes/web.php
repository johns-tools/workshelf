<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OneHundredApisController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogAdminController;

// # View
Route::get('/cv', function(){
    return view('cv');
});
Route::get('/', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');
Route::get('/one-hundred-apis', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');
Route::get('/blog', [BlogController::class, 'index'])->middleware('throttle:heavy');

// Blog Admin Routes
Route::prefix('blog/admin')->name('blog.admin.')->group(function () {
    Route::get('/', [BlogAdminController::class, 'index'])->name('index');
    Route::get('/create', [BlogAdminController::class, 'create'])->name('create');
    Route::post('/', [BlogAdminController::class, 'store'])->name('store');
    Route::get('/{id}', [BlogAdminController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BlogAdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BlogAdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [BlogAdminController::class, 'destroy'])->name('destroy');
});

// Route::get('/petrol-mileage', function () {
//     return view('petrol_mileage');
// })->middleware('throttle:heavy');

// Route::get('/area-conversion', function () {
//     return view('area_conversion');
// })->middleware('throttle:heavy');
