<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
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

            <div class="col-3">
                @livewire('admin.crear-cliente')
            </div>
        </div>
        @if ($clientes->count())

            <table class="w-100 divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
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
                            wire:click="orden('localidad')">
                            Localidad
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'localidad')
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
                            wire:click="orden('provincia')">
                            Provincia
                            {{-- Icono de direccionamiento --}}
                            @if ($campo == 'provincia')
                                @if ($direccion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            Accion
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clientes as $cli)
                        <tr>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $cli->dni }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $cli->nombre }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $cli->apellido }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $cli->localidad }}</div>
                            </td>
                            <td class="px-6 py-4  text-sm text-gray-500">
                                <div class="text-sm text-gray-900">{{ $cli->provincia }}</div>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex"> --}}
                            <td class="px-4 py-4 flex">
                                {{-- @livewire('editar-cliente', ['cliente' => $cliente], key($cliente->id)) --}}
                                <a wire:click="ver({{ $cli->id }})" class="">
                                    <i class="px-1 fas fa-eye"></i>
                                </a>

                                <a wire:click="editar({{ $cli }})" class="">
                                    <i class="px-1 fas fa-edit"></i>

                                </a>

                                <a wire:click="$emit('borrarCliente',{{ $cli->id }})" class="">
                                    <i class="px-1 fas fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>

            @if ($clientes->hasPages())
                <div class="px-6 py-3">
                    {{ $clientes->links() }}
                </div>
            @endif
        @else
            <div class="px-6 py-4">
                No existe ningun registro
            </div>

        @endif




    </x-tabla>

    <x-jet-dialog-modal wire:model="abrir"> {{-- MODIFICAR CLIENTE --}}
        <x-slot name="title">
            Editar el cliente {{ $tituloEdit }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="DNI" />
                <x-jet-input wire:model="cliente.dni" type="number" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="cliente.nombre" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellido" />
                <x-jet-input wire:model="cliente.apellido" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Domicilio" />
                <x-jet-input wire:model="cliente.domicilio" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Localidad" />
                <x-jet-input wire:model="cliente.localidad" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Provincia" />
                <x-jet-input wire:model="cliente.provincia" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefono" />
                <x-jet-input wire:model="cliente.telefono_1" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefono alternativo" />
                <x-jet-input wire:model="cliente.telefono_2" type="text" class="w-full" />
            </div>



        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrir',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="ml-2 disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="abrirVer"> {{-- VER CLIENTE --}}
        <x-slot name="title">
            Información del cliente
        </x-slot>

        <x-slot name="content">

            <div class="flex">

                <div class="w-1/2 p-4">

                    <div class="mb-4">
                        <x-jet-label value="DNI" />
                        <x-jet-label value="{{ $dni }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Nombre" />
                        <x-jet-label value="{{ $nombre }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Apellido" />
                        <x-jet-label value="{{ $apellido }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Domicilio" />
                        <x-jet-label value="{{ $domicilio }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                </div>

                <div class="w-2/2 p-4">

                    <div class="mb-4">
                        <x-jet-label value="Localidad" />
                        <x-jet-label value="{{ $localidad }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Provincia" />
                        <x-jet-label value="{{ $provincia }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Teléfono" />
                        <x-jet-label value="{{ $telefono1 }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Teléfono alternativo" />
                        <x-jet-label value="{{ $telefono2 }}" class="w-full font-sans text-lg text-gray-800" />
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abrirVer',false)">
                Cerrar
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>

    @section('js')
        <script>
            Livewire.on('borrarCliente', clienteId => {
                Swal.fire({
                    title: '¿Está seguro que desea eliminar?',
                    text: "No podrá revertir los cambios!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
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
    @endsection

</div>
