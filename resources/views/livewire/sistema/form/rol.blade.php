<x-modal wire:model="crearEditarRol" maxWidth="md">
    <x-slot:title>
        <div class='flex gap-2 text-xs'>
            <x-tag class="px-3 py-5" orden="8">
                <i class="fa-solid fa-user-secret fa-2xl fa-fw "></i>
            </x-tag>
            <div class='uppercase '>
                <span class='!font-semibold text-lg'>{{ $rol ? 'Actualizar rol' : 'Registrar nuevo rol' }}</span>
                <p>Formulario</p>
            </div>
        </div>
    </x-slot:title>

    <div class="space-y-4">
        <x-input-label label="Nombre del rol" wire:model.defer="nombre" for="nombre" />
    </div>

    <x-slot:footer>
        <button @click="openModal = false" wire:loading.attr="disabled"
            class="px-4 py-2.5 mr-1 text-xs font-medium text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:cursor-pointer">
            Cancelar
        </button>
        <x-button-gradient color="green" wire:click="guardar()" wire:loading.attr="disabled" wire:target="guardar">
            <span wire:loading wire:target="guardar" class="mr-2">
                <i class="fa fa-spinner fa-spin"></i>
            </span>
            {{ $rol ? 'Actualizar' : 'Guardar' }}
        </x-button-gradient>
    </x-slot:footer>
</x-modal>
