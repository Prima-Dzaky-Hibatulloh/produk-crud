<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;


Route::get('/', [ProdukController::class, 'index']); 
Route::resource('produk', ProdukController::class); 