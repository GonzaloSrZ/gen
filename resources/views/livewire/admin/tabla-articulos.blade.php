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
            <x-jet-input type="text" id="inputBuscar" class='flex-1 mx-4' placeholder="Escriba su busqueda..."
                wire:model="buscar" />

            {{-- Boton para llamar al modal de crear articulo --}}
            @livewire('admin.nuevo-articulo')
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
                            wire:click="orden('precio')">
                            Precio
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'precio')
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
                            wire:click="orden('precio')">
                            Tipo
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'precio')
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
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            accion
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
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">${{ number_format($art->precio, 2) }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $art->tipo }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $art->stock }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                {{-- @livewire('editar-cliente', ['cliente' => $cliente], key($cliente->id)) --}}
                                {{-- <a wire:click="editar({{ $art }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                                <button wire:click="agStock({{ $art }}) "
                                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fa-solid fa-plus"></i>
                                </button>

                                <a wire:click="$emit('borrarArticulo',{{ $art->id }})"
                                    class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                                    <i class="fas fa-trash"></i>
                                </a>
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

    {{-- EDITAR ARTICULO --}}
    <x-jet-dialog-modal wire:model="abrir">
        <x-slot name="title">
            Editar el articulo {{ $tituloEdit }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="articulo.nombre" type="text" class="w-full" />
                <x-jet-input-error for="articulo.nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input wire:model="articulo.precio" type="number" class="w-full" />
                <x-jet-input-error for="articulo.precio" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <x-jet-input wire:model="articulo.tipo" type="text" class="w-full" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Stock" />
                <x-jet-input wire:model="articulo.stock" type="number" class="w-full" />
                <x-jet-input-error for="articulo.stock" />
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:loading.attr="disabled"
                class="ml-2 disabled:opacity-25 bg-green-500 hover:bg-green-400 active:bg-green-700">
                Actualizar
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>

    {{-- AGREGAR STOCK --}}
    <x-jet-dialog-modal wire:model="abrirStock">
        <x-slot name="title">
            Agregar stock a {{ $tituloEdit }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Stock" />
                <x-jet-input wire:model="stock" wire:keydown.enter="updateStock" tabindex="1" id="inpFocus"
                    type="number" class="w-full" />
                <x-jet-input-error for="stock" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirStock',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="updateStock" wire:loading.attr="disabled"
                class="ml-2 disabled:opacity-25 bg-green-500 hover:bg-green-400 active:bg-green-700">
                Actualizar
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>

    @section('js')
        <script>
            window.onload = function() {
                document.getElementById("inputBuscar").focus();
            }
        </script>

        <script>
            Livewire.on('focusInput', function() {
                //$('#'+inpFocus).attr('autofocus', 'autofocus');
                console.log("mensaje");
                setTimeout(function() {
                    document.getElementById('inpFocus').focus();
                }, 1);
            });
        </script>
        <script>
            Livewire.on('borrarArticulo', articuloId => {
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

                        Livewire.emitTo('admin.tabla-articulos', 'borrar', articuloId);

                        Swal.fire(
                            'Borrado!',
                            'Su articulo a sido borrado satisfactoriamente',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endsection
</div>
