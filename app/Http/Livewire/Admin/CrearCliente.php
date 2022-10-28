<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use Livewire\Component;

class CrearCliente extends Component
{
    // open para abrir o cerrar modal
    public $open = false;

    //campos para guardar en base de datos
    public $dni, $nombre, $apellido, $domicilio, $localidad, $provincia, $telefono1, $telefono2;

    protected $rules = [
        // reglas de validación
        'dni' => 'required|max:8|min:7|unique:clientes',
        'nombre' => 'required',
        'apellido' => 'required',
    ];

    public function save()
    {
        //metodo para validar datos
        $this->validate();

        //guarda en base de datos 
        Cliente::create([
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'domicilio' => $this->domicilio,
            'localidad' => $this->localidad,
            'provincia' => $this->provincia,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2,
        ]);

        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('open', 'dni', 'nombre', 'apellido', 'domicilio', 'localidad', 'provincia', 'telefono1', 'telefono2');

        // emit para avisar a tabla que se agrego un cliente emitTo('tabla-cliente''render');
        $this->emit('render');

        // llama a la alerta
        $this->emit('alert', 'El cliente se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.admin.crear-cliente');
    }

    public function updatingOpen(){
        if ($this->open==false){
            $this->reset(['dni','nombre','apellido','domicilio','localidad','provincia','telefono1','telefono2']);
        }
    }
}