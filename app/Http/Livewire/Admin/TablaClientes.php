<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class TablaClientes extends Component
{
    use WithPagination;
    //defino variable para enviar a la vista
    public $buscar, $cliente;
    public $campo='apellido';
    public $direccion='asc';
    public $abrir= false; 
    public $abrirVer= false; 
    public $tituloEdit; 
    public $cant='10';

    public $dni, $nombre, $apellido, $domicilio, $localidad, $provincia, $telefono1, $telefono2;

    //recibe señal y llama a metodo
    protected $listeners=['render','borrar'];

    public function updatingBuscar(){
        $this->resetPage();
    }

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

    public function render()
    {
        $clientes = Cliente::where('dni' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('nombre' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('apellido' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('localidad' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('provincia' , 'like', '%' . $this->buscar . '%')
                            ->orderBy($this->campo,$this->direccion)
                            ->paginate($this->cant);
        
        //1ro vista del componente y 2do variable con datos para mostrar
        return view('livewire.admin.tabla-clientes', compact('clientes')); 
    }

    public function orden($campo){
        if ($this->campo == $campo) {
            if ($this->direccion == 'asc'){
                $this->direccion = 'desc';
            }
            else{
                $this->direccion = 'asc';
            }
        } else {
            $this->campo = $campo;
            $this->direccion = 'asc';
        }
    }

    public function editar(Cliente $cliente){
        $this->cliente = $cliente;
        $this->tituloEdit=$cliente->apellido . " " . $cliente->nombre;
        $this->abrir = true;
        
    }
    
    public function update(){
        //metodo para validar datos
        $this->validate();
        
        $this->cliente->save();
        
        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('abrir');
        
        // llama a la alerta
        $this->emit('alert', 'El cliente se actualizó satisfactoriamente');
    }
    
    public function borrar(Cliente $cliente){
        $cliente->delete();
    }
    
    public function ver(Cliente $cliente){
        $this->dni = $cliente->dni;
        $this->nombre = $cliente->nombre;
        $this->apellido = $cliente->apellido;
        $this->domicilio = $cliente->domicilio;
        $this->localidad = $cliente->localidad;
        $this->provincia = $cliente->provincia;
        $this->telefono1 = $cliente->telefono_1;
        $this->telefono2 = $cliente->telefono_2;
        $this->abrirVer=true;
    }
    
}

