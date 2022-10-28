<div>
    <a wire:click="$set('abrir',true)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
        <i class="fas fa-edit"></i>
    </a>

    <x-jet-dialog-modal wire:model="abrir">
        <x-slot name="title">
            Editar el cliente {{$cliente->apellido . " " . $cliente->nombre }}
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

            <x-jet-danger-button  wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
