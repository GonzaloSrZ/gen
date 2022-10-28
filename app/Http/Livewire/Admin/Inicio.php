<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Venta;
use DateTime;
use Livewire\Component;

class Inicio extends Component
{
    public $cantClientes=0,$totalVentas=0, $cantVentas=0, $mesVentas=0;


    public function render()
    {
        $this->cargarClientes();
        $this->cargarVentas();
       
        return view('livewire.admin.inicio');
    }

    public function cargarClientes(){
        $clientes=Cliente::all();
        $this->cantClientes=0;
        foreach($clientes as $cli){
            $this->cantClientes++;
        }
    }
    
    public function cargarVentas(){
        $ventas=Venta::all();
        $this->totalVentas=0;
        $this->cantVentas=0;
        $this->mesVentas=0;
        //$Limite=date(DateTime::ISO8601,strtotime('-1 month' ));
        $Limite=date(DateTime::ISO8601,strtotime('-7 day' ));
        foreach($ventas as $ven){
            $this->totalVentas=$this->totalVentas+$ven->precioTotal;
            if ($Limite <= $ven->created_at){
                $this->mesVentas=$this->mesVentas+$ven->precioTotal;
                $this->cantVentas++;
            }
        }
        $this->totalVentas=number_format($this->totalVentas, 2);
        $this->mesVentas=number_format($this->mesVentas, 2);
    }
}
