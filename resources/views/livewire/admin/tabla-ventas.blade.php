<div>
    <x-tabla>
        <div class="px-4 py-4 form-group row align-items-center">

            <div class="col-3 d-flex justify-content-center align-items-center">
                <span>Mostrar</span>

                <select wire:model="cant" class="form-select mx-2" style="width: 75px;" >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>

                <span>entradas</span>

            </div>

            {{-- input para buscar --}}
            <div class="col-6">
                <input type="text" class="form-control input-sm"  wire:model="buscar" placeholder="Escriba su busqueda...">
            </div>

            {{-- Boton para llamar al modal de crear cliente --}}
            <a href="{{ route('admin.ventas.crear') }}" class="col-3">
                <x-jet-button >
                    Nueva Venta
                </x-jet-button>
            </a>
        </div>
        @if ($ventas->count())

            <table class="w-100 divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('id')">
                            ID

                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'id')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('dni')">
                            DNI

                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'dni')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif

                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('nombre')">
                            Nombre
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'nombre')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('apellido')">
                            Apellido
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'apellido')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('estado')">
                            Estado
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'estado')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="orden('updated_at')">
                            Fecha
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'updated_at')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ventas as $ven)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $ven->id }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $ven->dni }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $ven->nombre }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $ven->apellido }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $ven->estado }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $ven->updated_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                {{-- @livewire('editar-cliente', ['cliente' => $cliente], key($cliente->id)) --}}
                                <a wire:click="ver({{ $ven }})"
                                    class="">
                                    <i class="px-1 fas fa-eye"></i>
                                </a>

                                <a wire:click="editar({{ $ven }})"
                                    class="">
                                    <i class="px-1 fas fa-edit"></i>
                                </a>

                                <a href="#" onclick="window.open('/pdf/'+{{$ven->id}}, '_blank' )" class="">
                        
                                    <i class="px-1 fa-solid fa-print"></i>
                                   
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>

            @if ($ventas->hasPages())
                <div class="px-6 py-3">
                    {{ $ventas->links() }}
                </div>
            @endif
        @else
            <div class="px-6 py-4">
                No existe ningun registro
            </div>

        @endif




    </x-tabla>

    <x-jet-dialog-modal wire:model="abrirVer"> {{-- VER VENTA --}}
        <x-slot name="title">
            Información de la venta
        </x-slot>

        <x-slot name="content">

            {{-- <div class="flex">

                    <div class="mb-4">
                        <x-jet-label value="DNI" />
                        <x-jet-label value="{{ $dni }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Nombre" />
                        <x-jet-label value="{{ $nombre }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

            </div> --}}

            <x-tabla>
                <div class="flex">

                    <div class="w-1/2 p-4">

                        <div class="mb-4">
                            <x-jet-label value="DNI" />
                            <x-jet-label value="{{ $dni }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Nombre" />
                            <x-jet-label value="{{ $nombre }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Apellido" />
                            <x-jet-label value="{{ $apellido }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Precio Total" />
                            <x-jet-label value="${{ $precioTotal }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                    </div>

                    <div class="w-2/2 p-4">

                        <div class="mb-4">
                            <x-jet-label value="Estado" />
                            <x-jet-label value="{{ $estado }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Modo Pedido" />
                            <x-jet-label value="{{ $modoPedido }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Forma de Pago" />
                            <x-jet-label value="{{ $formaPago }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label value="Fecha" />
                            <x-jet-label value="{{ $fecha }}"
                                class="w-full font-sans text-lg text-gray-800" />
                        </div>

                    </div>

                </div>
                <div class="px-6 py-4 flex item-center">

                    
                    @if (is_countable($ventaArts) && count($ventaArts))

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="orden('id')">
                                        Id

                                        {{-- Icono de direccionamiento --}}
                                        @if ($campo == 'id')
                                            @if ($direccion == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif

                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="orden('nombre')">
                                        Nombre
                                        {{-- Icono de direccionamiento --}}
                                        @if ($campo == 'nombre')
                                            @if ($direccion == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="orden('stock')">
                                        Cantidad
                                        {{-- Icono de direccionamiento --}}
                                        @if ($campo == 'stock')
                                            @if ($direccion == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="orden('stock')">
                                        Precio Unitario
                                        {{-- Icono de direccionamiento --}}
                                        @if ($campo == 'stock')
                                            @if ($direccion == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="orden('stock')">
                                        Precio Total
                                        {{-- Icono de direccionamiento --}}
                                        @if ($campo == 'stock')
                                            @if ($direccion == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($ventaArts as $art)
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">{{ $art->id_articulo }}</div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">{{ $art->nombre }}</div>
                                        </td>
                                        <td class="px-6 py-4  text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">{{ $art->cantidad }}</div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">${{ $art->precio }}</div>
                                        </td>
                                        <td class="px-6 py-4  text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">${{ $art->cantidad * $art->precio }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>

                        {{-- @if ($ventaArts->hasPages())
                        <div class="px-6 py-3">
                            {{ $ventaArts->links() }}
                        </div>
                    @endif --}}
                    @else
                        <div class="px-6 py-4">
                            No hay ningun artículo
                        </div>

                    @endif

            </x-tabla>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirVer',false)">
                Cerrar
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>



    {{-- @section('js')
        <script>
            Livewire.on('borrarCliente', clienteId => {
                Swal.fire({
                    title: '¿Está seguro que desea eliminar?',
                    text: "No podrá revertir los cambios!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminalo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.tabla-clientes', 'borrar', clienteId);

                        Swal.fire(
                            'Borrado!',
                            'Su cliente a sido borrado satisfactoriamente',
                            'success'
                        )
                    }
                })
            })
        </script>

    @endsection --}}
</div>
