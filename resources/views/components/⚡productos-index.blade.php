<?php
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination; 
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
    <input type="text" wire:model.live.debounce.400ms="buscar" placeholder="Buscar por nombre o código">
    <table>
        @forelse ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->cantidad->first()?->stock }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Sin datos</td>
            </tr>
        @endforelse
    </table>
    {{ $productos->links() }}

</div>
