<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListLogController;
use App\Http\Controllers\BusinessPartnersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddonListController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('list-logs', [ListLogController::class, 'index'])->name('list-logs.index');
Route::get('list-logs/data', [ListLogController::class, 'getData'])->name('list-logs.data');
Route::get('list-logs/create', [ListLogController::class, 'create'])->name('list-logs.create');
Route::post('list-logs', [ListLogController::class, 'store'])->name('list-logs.store');

Route::get('/addon_list', function () {
    return view('addon_list.index');
})->middleware(['auth', 'verified'])->name('addon_list');
Route::get('addon_list', [AddonListController::class, 'index'])->name('addon_list.index');
Route::get('addon_list/data', [AddonListController::class, 'getData'])->name('addon_list.data');
Route::get('addon_list/create', [AddonListController::class, 'create'])->name('addon_list.create');
Route::post('addon_list', [AddonListController::class, 'store'])->name('addon_list.store');

Route::get('/business_partners', function () {
    return view('business_partners.index');
})->middleware(['auth', 'verified'])->name('business_partners');
Route::get('business_partners', [BusinessPartnersController::class, 'index'])->name('business_partners.index');
Route::get('business_partners/data', [BusinessPartnersController::class, 'getData'])->name('business_partners.data');
Route::get('business_partners/create', [BusinessPartnersController::class, 'create'])->name('business_partners.create');
Route::post('business_partners', [BusinessPartnersController::class, 'store'])->name('business_partners.store');
Route::delete('business_partners/{bp_code}', [BusinessPartnersController::class, 'destroy'])->name('business_partners.destroy');

require __DIR__.'/auth.php';
