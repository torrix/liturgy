<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::resource('readings', ReadingController::class)->middleware('auth');
Route::resource('prayers', PrayerController::class)->middleware('auth');
Route::resource('sections', SectionController::class)->middleware('auth');
