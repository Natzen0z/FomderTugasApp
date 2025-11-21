<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;

// HOME (KATALOG)
Route::get('/', function () {
    $items = Item::all();
    return view('home', compact('items'));
});
Route::view('/order', 'order');
Route::view('/partnership', 'partnership');
Route::view('/about', 'about');


// CRUD ITEMS
Route::resource('items', ItemController::class)->except(['show']);
