<div>
    <x-jet-button wire:click="$set('open',true)" class="ml-2 disabled:opacity-25 bg-blue-500 hover:bg-blue-400 active:bg-blue-700">
        Nuevo cliente
    </x-jet-button>


    <x-jet-dialog-modal wire:model="open">


        <x-slot name='title'>
            Crear nuevo cliente
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="DNI" />
                <x-jet-input wire:model.defer="dni" type="number" class="w-full" />

                <x-jet-input-error for="dni"/>

            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model.defer="nombre" type="text" class="w-full" />

                <x-jet-input-error for="nombre"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellido" />
                <x-jet-input wire:model.defer="apellido" type="text" class="w-full" />

                <x-jet-input-error for="apellido"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Domicilio" />
                <x-jet-input wire:model.defer="domicilio" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Localidad" />
                <x-jet-input wire:model.defer="localidad" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Provincia" />
                <x-jet-input wire:model.defer="provincia" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefono" />
                <x-jet-input wire:model.defer="telefono1" type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefono alternativo" />
                <x-jet-input wire:model.defer="telefono2" type="text" class="w-full" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 disabled:opacity-25 bg-green-500 hover:bg-green-400 active:bg-green-700"  wire:click="save">
                Guardar
            </x-jet-button>


        </x-slot>


    </x-jet-dialog-modal>

</div>
