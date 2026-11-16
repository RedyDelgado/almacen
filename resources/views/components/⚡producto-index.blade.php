<?php
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

new class extends Component {
    use WithPagination;

    public $buscar = '';
 
    public function with(): array
    {
        $consulta = Producto::with(['cantidad.almacen']);

        if ($this->buscar) {
            $consulta->where('nombre', 'like', '%' . $this->buscar . '%');
        }

        return [
            'productos' => $consulta->orderBy('nombre')->paginate(10),
        ];
    }
};
?>

<div> 
    <input 
        type="text"
        wire:model.live.debounce.400ms="buscar"
        placeholder="Buscar por nombre o código"
        class="border rounded px-3 py-2 mb-4 w-full"
    >
     
    <table class="w-full text-left border-collapse bg-amber-600">
        <tbody>
            @forelse ($productos as $producto)
                <tr class="border-b border-gray-300 hover:bg-amber-400">
                    <td class="p-2">{{ $producto->id }}</td>
                    <td class="p-2">{{ $producto->nombre }}</td>
                    <td class="p-2">{{ $producto->precio }}</td>
                    <td class="p-2">{{ $producto->cantidad->first()?->stock }}</td>
                    <td class="p-2">{{ $producto->cantidad->first()?->almacen?->nombre }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-white">Sin datos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
 
    <div class="mt-4">
        {{ $productos->links() }}
    </div>
</div>