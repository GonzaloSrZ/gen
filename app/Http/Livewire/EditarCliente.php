<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class EditarCliente extends Component
{
    public $abrir=false;
    public Cliente $cliente;


    protected function rules(){
        return [
            'cliente.dni' => 'required|unique:clientes,dni,' . $this->cliente->id,
            'cliente.nombre' => 'required',
            'cliente.apellido' => 'required',
            'cliente.domicilio' => '',
            'cliente.localidad' => '',
            'cliente.provincia' => '',
            'cliente.telefono_1' => '',
            'cliente.telefono_2' => '',
        ];
    }

    public function mount(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function save(){
        //metodo para validar datos
        $this->validate();

        $this->cliente->save();
        
        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('abrir');

        // emit para avisar a tabla que se agrego un cliente emitTo('tabla-cliente''render');
        $this->emit('render');

        // llama a la alerta
        $this->emit('alert', 'El cliente se actualizó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.cliente.editar-cliente');
    }
}
