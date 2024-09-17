<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.dashboard.dashboard');
});

Route::resource('category',CategoryController::class);
Route::resource('subCategory',SubCategoryController::class);

