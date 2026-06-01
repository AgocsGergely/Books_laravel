<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
Route::resource('authors', \App\Http\Controllers\AuthorsController::class);
Route::resource('publishers', \App\Http\Controllers\PublishersController::class);
Route::resource('series', \App\Http\Controllers\SeriesController::class);
Route::resource('books', \App\Http\Controllers\BooksController::class);
