<?php

namespace App\Http\Livewire\Admin;

use App\Models\Venta;
use App\Models\Venta_Articulo;
use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class TablaVentas extends Component
{
    use WithPagination;
    //defino variable para enviar a la vista
    public $buscar, $venta, $ventaArts;
    public $campo = 'updated_at';
    public $direccion = 'desc';
    public $abrir = false;
    public $abrirVer = false;
    public $tituloEdit;
    public $cant = '10';

    public $dni, $nombre, $apellido, $domicilio, $localidad, $provincia, $telefono1, $telefono2;

    public $precioTotal = '0', $estado, $modoPedido, $formaPago, $fecha;

    //recibe señal y llama a metodo
    protected $listeners = ['render', 'borrar'];

    public function updatingBuscar()
    {
        $this->resetPage();
    }
    public function render()
    {
        $ventas = Venta::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->where("ventas.id_cliente", "=", 'clientes.id')
            ->select('ventas.*', 'clientes.nombre', 'clientes.apellido', 'clientes.dni')
            ->where('ventas.id', 'like', '%' . $this->buscar . '%')
            ->orWhere('clientes.nombre', 'like', '%' . $this->buscar . '%')
            ->orWhere('clientes.dni', 'like', '%' . $this->buscar . '%')
            ->orWhere('clientes.apellido', 'like', '%' . $this->buscar . '%')
            ->orWhere('estado', 'like', '%' . $this->buscar . '%')
            ->orderBy($this->campo, $this->direccion)
            ->paginate($this->cant);

        //1ro vista del componente y 2do variable con datos para mostrar
        return view('livewire.admin.tabla-ventas', compact('ventas'));
    }

    public function orden($campo)
    {
        if ($this->campo == $campo) {
            if ($this->direccion == 'asc') {
                $this->direccion = 'desc';
            } else {
                $this->direccion = 'asc';
            }
        } else {
            $this->campo = $campo;
            $this->direccion = 'asc';
        }
    }

    public function editar(Venta $venta)
    {
        $this->venta = $venta;
        $this->abrir = true;
    }

    public function update()
    {
        //metodo para validar datos
        $this->validate();

        $this->cliente->save();

        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('abrir');

        // llama a la alerta
        $this->emit('alert', 'El cliente se actualizó satisfactoriamente');
    }

    public function ver(Venta $venta)
    {
        $cli = Cliente::find($venta->id_cliente);
        $this->dni = $cli->dni;
        $this->nombre = $cli->nombre;
        $this->apellido = $cli->apellido;
        $this->precioTotal = $venta->precioTotal;
        $this->estado = $venta->estado;
        $this->formaPago = $venta->formaPago;
        $this->modoPedido = $venta->modoPedido;
        $this->fecha = $venta->created_at;
        $this->ventaArts = Venta::join('venta__articulos', 'ventas.id', '=', 'venta__articulos.id_venta')
            ->join('articulos', 'venta__articulos.id_articulo', '=', 'articulos.id')
            ->where("ventas.id", "=", $venta->id)
            ->select('venta__articulos.*', 'articulos.nombre')->get();
        // echo "<script>console.log('Console: " . $this->ventaArts . "' );</script>";
        $this->abrirVer = true;
    }
}
