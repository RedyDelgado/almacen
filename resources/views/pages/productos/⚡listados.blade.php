<?php

use Livewire\Component;
use App\Models\Producto;
use Livewire\Attributes\Computed;


new class extends Component
{
    public function productos(){
        return Producto::with(['cantidad.almacen'])->get();
    }
};
?>

@extends('layouts.app')
@section('contenido')
<div>
    <table class="w-full text-left border-collapse bg-amber-600">
        @forelse ( $this->productos() as $producto)
            <tr class="border-b border-gray-300 hover:bg-amber-400">
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->cantidad->first()?->stock }}</td>
                <td>{{ $producto->cantidad->first()?->almacen?->nombre }}</td>
            </tr>
        @empty
            <div class="bg-amber-200 text-sm font-bold text-center col-span-5">Sin datos... </div>
        @endforelse
    </table>

</div>

@endsection