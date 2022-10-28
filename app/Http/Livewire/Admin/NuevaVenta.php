<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\PdfController;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Venta_Articulo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Codedge\Fpdf\Fpdf\Fpdf;

class NuevaVenta extends Component
{
    public $dni, $nombre, $apellido, $cliente;

    public $buscar, $articulo;
    public $campo = 'nombre';
    public $direccion = 'asc';
    public $abrir = false;
    public $tituloEdit;
    public $cant = '10';

    public $cantidad;
    public $precioTotal = 0.00, $modoPedido = "Local", $formaPago = "Efectivo", $estado = "Entregado";
    public $lista = [];

    protected $rules = [
        'precioTotal' => 'required',
        'modoPedido' => 'required',
        'formaPago' => 'required',
        'estado' => 'required',
    ];


    public function render()
    {
        $cliente = Cliente::where('dni', $this->dni)->get();
        $this->cliente = $cliente;
        if ($this->cliente == "[]") {
            $this->nombre = "No se encontró el cliente";
            $this->apellido = "No se encontró el cliente";
        } else {
            $this->nombre = $cliente[0]->nombre;
            $this->apellido = $cliente[0]->apellido;
        }

        $articulos = Articulo::where('id', 'like', '%' . $this->buscar . '%')
            ->orWhere('nombre', 'like', '%' . $this->buscar . '%')
            ->orWhere('precio', 'like', '%' . $this->buscar . '%')
            ->orWhere('tipo', 'like', '%' . $this->buscar . '%')
            ->orWhere('stock', 'like', '%' . $this->buscar . '%')
            ->orderBy($this->campo, $this->direccion)
            ->paginate($this->cant);

        return view('livewire.admin.nueva-venta', compact('articulos'));
    }

    function collect($value = null)
    {
        return new Collection($value);
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

    public function agLista(Articulo $articulo)
    {
        if ($this->cantidad > 0) {

            $this->lista = collect($this->lista);
            $b = 0;

            $artic = Articulo::find($articulo->id);
            if ($artic->stock >= $this->cantidad) {
                foreach ($this->lista as $id => $items) {
                    if ($articulo->id == $items['id']) {
                        if ($artic->stock >= $items['cantidad'] + $this->cantidad) {
                            $this->precioTotal = $this->precioTotal - $items['precioT'];
                            $items['cantidad'] = $items['cantidad'] + $this->cantidad;
                            $items['precioT'] = $items['cantidad'] * $items['precioU'];
                            $this->lista[$id] = $items;
                            $this->precioTotal = $this->precioTotal + $items['precioT'];
                        } else {
                            $this->emit('alertStock');
                        }
                        $b = 1;
                    }
                }

                if ($b == 0) {
                    $item['id'] = $articulo->id;
                    $item['nombre'] = $articulo->nombre;
                    $item['cantidad'] = $this->cantidad;
                    $item['precioU'] = $articulo->precio;
                    $item['precioT'] = $this->cantidad * $articulo->precio;
                    $this->lista->push($item);
                    $this->precioTotal = $this->precioTotal + $item['precioT'];
                }
                //redirect('pdf');
            } else {
                $this->emit('alertStock');
            }
        } else {
            $this->emit('alert2','Debe ingresar una cantidad valida');
        }
    }

    public function confirmarCompra()
    {
        //$this->validate();
        $this->lista = collect($this->lista);
        //echo "<script>console.log('Console: " . $this->precioTotal . "' );</script>";
        //echo "<script>console.log('Console: " . $this->modoPedido . "' );</script>";
        if ($this->nombre != "No se encontró el cliente") {
            if (count($this->lista)) {



                
                $venta = Venta::create([
                    'precioTotal' => $this->precioTotal,
                    'modoPedido' => $this->modoPedido,
                    'formaPago' => $this->formaPago,
                    'estado' => $this->estado,
                    'id_cliente' => $this->cliente[0]->id,
                    'id_user' => auth()->user()->id
                ]);

                foreach ($this->lista as $items) {
                    Venta_Articulo::create([
                        'cantidad' => $items['cantidad'],
                        'precio' => $items['precioU'],
                        'id_venta' => $venta->id,
                        'id_articulo' => $items['id']
                    ]);
                    $artic = Articulo::find($items['id']);
                    $artic->stock = $artic->stock - $items['cantidad'];
                    $artic->save();
                }
                $this->emit('alertConf',$venta->id);
            } else {
                $this->emit('alert2','Debe cargar articulos en la lista');
            }
        } else {
            $this->emit('alert2','Debe ingresar un cliente válido');
        }
    }

    public function borrar($item)
    {
        $this->lista = collect($this->lista);
        foreach ($this->lista as $id => $items) {
            if ($item == $items['id']) {
                $this->precioTotal = $this->precioTotal - $items['precioT'];
                $this->lista->pull($id);
            }
        }
    }
}
