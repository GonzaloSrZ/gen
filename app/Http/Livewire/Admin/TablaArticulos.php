<?php

namespace App\Http\Livewire\Admin;

use App\Models\Articulo;
use Livewire\Component;
use Livewire\WithPagination;

class TablaArticulos extends Component
{
    use WithPagination;
    //defino variable para enviar a la vista
    public $buscar, $articulo,$stock;
    public $campo='nombre';
    public $direccion='asc';
    public $abrir= false, $abrirStock=false; 
    public $tituloEdit; 
    public $cant='10';

    //recibe señal y llama a metodo
    protected $listeners=['render','borrar'];

    public function updatingBuscar(){
        $this->resetPage();
    }

    protected function rules(){
        return [
            // 'articulo.nombre' => 'required|unique:articulos,nombre,' . $this->articulo->id,
            // 'articulo.precio' => 'required|numeric|gt:0',
            // 'articulo.tipo' => '',
            // 'articulo.stock' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0'
        ];
    }

    public function render()
    {
        $articulos = Articulo::where('id' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('nombre' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('precio' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('tipo' , 'like', '%' . $this->buscar . '%')
                            ->orWhere('stock' , 'like', '%' . $this->buscar . '%')
                            ->orderBy($this->campo,$this->direccion)
                            ->paginate($this->cant);
        
        //1ro vista del componente y 2do variable con datos para mostrar
        return view('livewire.admin.tabla-articulos', compact('articulos')); 
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

    public function editar(Articulo $articulo){
        $this->articulo = $articulo;
        $this->tituloEdit=$articulo->nombre;
        $this->abrir = true;

    }

    public function agStock(Articulo $articulo){
        $this->stock=null;
        $this->articulo = $articulo;
        $this->tituloEdit=$articulo->nombre;
        $this->abrirStock = true;
        $this->emit('focusInput');
    }



    public function update(){
        //metodo para validar datos
        $this->validate();

        $this->articulo->save();
        
        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('abrir');

        // llama a la alerta
        $this->emit('alert', 'El artículo se actualizó satisfactoriamente');
    }

    public function updateStock(){
        //metodo para validar datos
        $this->validate();

        $this->articulo->stock+=$this->stock;
        $this->articulo->save();
        
        //resetea los campos para que desaparezca el modal y se limpie la informacion escrita
        $this->reset('abrirStock');

        // llama a la alerta
        $this->emit('alert', 'El Stock se incrementó satisfactoriamente');
    }

    public function borrar(Articulo $articulo){
        $articulo->delete();
    }
}