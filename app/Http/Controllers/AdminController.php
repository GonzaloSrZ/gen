<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    
    public function ventas()
    {
        $venta = new VentaController;
        $ventas = $venta->index();
        return view('admin.venta.index')->with('ventas',$ventas);
    }
    
    public function crearVenta()
    {
        $clientes = new ClienteController;
        $clientes = $clientes->index();
        return view('admin.venta.crear')->with('clientes',$clientes);
    }
    
    public function clientes()
    {
        $cliente= new ClienteController;
        $clientes=$cliente->index();
        return view('admin.cliente.index')->with('clientes',$clientes);
    }
    
    public function articulos()
    {
        $articulo = new ArticuloController;
        $articulos = $articulo->index();
        return view('admin.articulo.index')->with('articulos',$articulos);
    }
}