<div>
    <x-jet-button wire:click="$set('open',true)" class="ml-2 disabled:opacity-25 bg-blue-500 hover:bg-blue-400 active:bg-blue-700">
        Nuevo articulo
    </x-jet-button>


    <x-jet-dialog-modal wire:model="open">


        <x-slot name='title'>
            Agregar nuevo articulo
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model.defer="nombre" type="text" class="w-full" />

                <x-jet-input-error for="nombre"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input wire:model.defer="precio" type="number" class="w-full" />

                <x-jet-input-error for="precio"/>
            </div>
            
            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <x-jet-input wire:model.defer="tipo" type="text" class="w-full" />
            </div>
            
            <div class="mb-4">
                <x-jet-label value="Stock" />
                <x-jet-input wire:model.defer="stock" type="number" class="w-full" />
                
                <x-jet-input-error for="stock"/>
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 disabled:opacity-25 bg-green-500 hover:bg-green-400 active:bg-green-700"  wire:click="save">
                Confirmar
            </x-jet-button>


        </x-slot>


    </x-jet-dialog-modal>
</div>
