@extends('admin.menu')

@section('head')

@stop
@section('content')

<h4>TABLA CLIENTES</h4>

@livewire('admin.tabla-clientes')

{{-- <div class="card">
    <div class="card-body">
        <table id="pub"  class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->dni}}</td>
                    <td>{{$cliente->nombre_apellido}}</td>
                    <td>{{$cliente->localidad}}</td>
                    <td>{{$cliente->provincia}}</td>
                    <td>
                    <a href="#" class="btn btn-info">Ver</a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
@stop
@section('js')
    

@endsection