<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//traernos productos
Route::get('/', [ProductController::class, 'getProducts']);
//ir a página de agregar producto
Route::get('/agregar_producto', function () {
    return view('add_product');
});
//agregar producto
Route::post('add_product', [ProductController::class, 'addProduct'])->name('add_product');
//eliminar producto
Route::delete('delete_product/{id}', [ProductController::class, 'deleteProduct'])->name('delete_product');
//editar producto
Route::get('edit_product/{id}', [ProductController::class, 'editProduct'])->name('edit_product');
//actualizar producto
Route::put('update_product/{id}', [ProductController::class, 'updateProduct'])->name('update_product');
