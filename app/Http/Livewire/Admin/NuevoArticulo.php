<?php

namespace App\Http\Livewire\Admin;

use App\Models\Articulo;
use Livewire\Component;

class NuevoArticulo extends Component
{
    // open para abrir o cerrar modal
    public $open = false;

    //campos para guardar en base de datos
    public $nombre, $precio, $tipo, $stock;

    protected $rules = [
        // reglas de validación
        'nombre' => 'required|unique:articulos',
        'precio' => 'required|numeric|gt:0',
        'stock' => 'required|numeric|gt:0',
    ];

    public function save()
    {
        //metodo para validar datos
        $this->validate();

        //guarda en base de datos 
        Articulo::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'tipo' => $this->tipo,
            'stock' => $this->stock
        ]);

        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('open', 'nombre', 'precio', 'tipo', 'stock');

        // emit para avisar a tabla que se agrego un cliente emitTo('tabla-cliente''render');
        $this->emit('render');

        // llama a la alerta
        $this->emit('alert', 'El articulo se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.admin.nuevo-articulo');
    }

    public function updatingOpen(){
        if ($this->open==false){
            $this->reset(['nombre','precio','tipo','stock']);
        }
    }
}
