<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Livewire\Pages\Productos\Listado;

//Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index'); 

//Route::resource('/productos', ProductosController::class);

Route::livewire('/productos','pages::productos.listados')->name('productos.index');