<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

Route::get('/', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/{slug}', [ProviderController::class, 'show'])->name('providers.show');
