<div>

    <div class="px-6 py-4 flex item-center">

        <div class="mx-2">
            <x-jet-label value="DNI del Cliente" />
            <x-jet-input type="number" wire:model="dni" placeholder="Ingrese DNI" class="my-2" />
        </div>

        <div class="mx-2 w-50">
            <x-jet-label value="Nombre" />
            <x-jet-label value="{{ $nombre }}" class="font-sans text-lg text-gray-800" />
        </div>

        <div class="mx-2 max-w-[20px]">
            <x-jet-label value="Apellido" />
            <x-jet-label value="{{ $apellido }}" class="font-sans text-lg text-gray-800" />
        </div>

        <div class="mx-2">
            <x-jet-button wire:click="$set('abrir',true)" class="ml-2 disabled:opacity-25 bg-blue-500 hover:bg-blue-400 active:bg-blue-700">
                Agregar Articulo
            </x-jet-button>
        </div>
    </div>

    <x-tabla>
        <div class="px-2 py-4 flex item-center">

        </div>
        @if (is_countable($lista) && count($lista) > 0)

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
                            Articulo
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
                            Precio unitario
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($lista as $item)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $item['id'] }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $item['nombre'] }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $item['cantidad'] }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">${{ number_format($item['precioU'], 2) }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">${{number_format($item['precioT'],2 )}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                <x-jet-danger-button wire:click="borrar({{ $item['id'] }})"
                                    wire:loading.attr="disabled"  class="ml-2 bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fas fa-trash"></i>
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>

            @if ($articulos->hasPages())
                <div class="px-6 py-3">
                    {{ $articulos->links() }}
                </div>
            @endif
        @else
            <div class="px-6 py-4">
                No se agregó ningun articulo
            </div>

        @endif

    </x-tabla>

    <div class="px-2 py-4 flex item-center">

        <div class="mx-2">
            <x-jet-label value="Precio Total" />
            <x-jet-label value="${{ number_format($precioTotal,2) }}" class="font-sans text-lg text-gray-800" />
        </div>

        <div class="mx-2 w-50 grow-0">
            <x-jet-label value="Modo de Pedido" />
            <select wire:model="modoPedido"
                class="mx-2 w-full pl-2 pr-8 py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="Local">Local</option>
                <option value="Envio">Envio</option>
                <option value="Online">Online</option>
            </select>
        </div>

        <div class="mx-2 w-50">
            <x-jet-label value="Forma de Pago" />
            <select wire:model="formaPago"
                class="mx-2 w-full pl-2 pr-8 py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="Efectivo">Efectivo</option>
                <option value="Credito">Credito</option>
                <option value="Debito">Debito</option>
            </select>
        </div>

        <div class="mx-2 w-50">
            <x-jet-label value="Estado" />
            <select wire:model="estado"
                class="mx-2 w-full pl-2 pr-8 py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="Entregado">Entregado</option>
                <option value="Pendiente">Pendiente</option>
            </select>
        </div>

        <div class="mx-2">
            <x-jet-button wire:click="confirmarCompra()"  class="ml-2 disabled:opacity-25 bg-green-500 hover:bg-green-400 active:bg-green-700"
            {{-- wire:loading.attr="disabled" class="ml-2 disabled:opacity-25"> --}}>
                Confirmar Compra
            </x-jet-button>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="abrir" maxWidth="2xl">
        <x-slot name="title">
            Seleccionar articulo
        </x-slot>

        <x-slot name="content">
            <x-tabla>
                <div class="px-6 py-4 flex item-center">

                    {{-- input para buscar --}}
                    <x-jet-input type="text" class='flex-1 mx-4' placeholder="Escriba su busqueda..."
                        wire:model="buscar" />
                    {{-- input para cantidad --}}
                    <x-jet-input type="number" class='flex mx-1' placeholder="Ingrese cantidad" wire:model="cantidad" />

                </div>
                @if (count($articulos))

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
                                    Stock
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($articulos as $art)
                                <tr>
                                    <td class="px-6 py-4 ">
                                        <div class="text-sm text-gray-900">{{ $art->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="text-sm text-gray-900">{{ $art->nombre }}</div>
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        <div class="text-sm text-gray-900">{{ $art->stock }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                        <x-jet-button wire:click="agLista({{ $art }})"
                                        wire:loading.attr="disabled" class="ml-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                            <i class="fa-solid fa-plus"></i>
                                        </x-jet-button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>

                    @if ($articulos->hasPages())
                        <div class="px-6 py-3">
                            {{ $articulos->links() }}
                        </div>
                    @endif
                @else
                    <div class="px-6 py-4">
                        No existe ningun registro
                    </div>

                @endif

            </x-tabla>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir',false)">
                Cerrar
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>

    @section('js')
        <script>
            Livewire.on('alertStock', articuloId => {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'El stock no es suficiente',
                    //footer: '<a href="">Why do I have this issue?</a>'
                })
            })
        </script>

        {{-- <script>
            Livewire.on('alertCantidad', articuloId => {
                Swal.fire('Debe ingresar una cantidad valida')
            })
        </script> --}}
        
        {{-- <script>
            Livewire.on('alertCliente', articuloId => {
                Swal.fire('Debe ingresar un cliente válido')
            })
        </script> --}}
        
        <script>
            // Livewire.on('alertLista', articuloId => {
            //     Swal.fire('Debe cargar articulos en la lista')
            // })

            Livewire.on('alertConf', function(message) {
            Swal.fire(
                'Bien hecho!',
                'La Venta se efectuó correctamente!',
                'success'
            ).then(function() {
                window.open("/pdf/"+message, '_blank' );
                window.location = "/admin/ventas/";
            });
        })
        </script>

        
    @endsection

</div>
