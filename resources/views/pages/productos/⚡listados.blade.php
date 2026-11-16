<?php

use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\Computed;


new class extends Component
{ 
};
?>

@extends('layouts.app')
@section('contenido') 
    <h1 class="text-2xl font-bold mb-4">Listado de productos</h1>
    <livewire:producto-index />
 

@endsection