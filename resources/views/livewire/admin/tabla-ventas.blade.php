<div>
    <x-tabla>
        <div class="px-6 py-4 flex item-center">

            <div class="flex items-center">
                <span>Mostrar</span>

                <select wire:model="cant"
                    class="mx-2 w-full pl-2 pr-8 py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <span>entradas</span>

            </div>

            {{-- input para buscar --}}
            <x-jet-input type="text" class='flex-1 mx-4' placeholder="Escriba su busqueda..." wire:model="buscar" />

            {{-- Boton para llamar al modal de crear cliente --}}
            <a href="{{ route('admin.ventas.crear') }}">
                <x-jet-button class="ml-2 disabled:opacity-25 bg-blue-500 hover:bg-blue-400 active:bg-blue-700">
                    Nueva Venta
                </x-jet-button>
            </a>
        </div>
        @if ($ventas->count())

            <table class="min-w-full divide-y divide-gray-200">
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
                                    class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a wire:click="editar({{ $ven }})"
                                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" onclick="window.open('/pdf/'+{{$ven->id}}, '_blank' )" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                        
                                    <i class="fa-solid fa-print"></i>
                                   
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
