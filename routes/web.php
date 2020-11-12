<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

Route::resource('readings', ReadingController::class)->middleware('auth');
Route::resource('prayers', PrayerController::class)->middleware('auth');
Route::resource('sections', SectionController::class)->middleware('auth');

Route::get('/{date?}', [HomeController::class, 'index'])
     ->where(['year' => '^([1-9][0-9]{3})-(1[0-2]|0[1-9])-(3[01]|0[1-9]|[12][0-9])?$']);
