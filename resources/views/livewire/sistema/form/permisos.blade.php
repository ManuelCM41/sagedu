<x-sidebar wire:model="mostrarPermisos">
    <x-slot:title>
        <div class='flex gap-2 text-xs'>
            <x-tag class="px-3 py-5" orden="8">
                <i class="fa-solid fa-user-secret fa-2xl fa-fw"></i>
            </x-tag>
            <div class='uppercase '>
                <span class='!font-semibold text-lg'>{{ $rol?->name }}</span>
                <p>Permisos por sección</p>
            </div>
        </div>
    </x-slot:title>
    @if ($rol)
        <div class="grid grid-cols-1 sm:grid-cols-2">
            @foreach ($permisos as $section => $permissionsInSection)
                <div class="mb-2">
                    <h3 class="mb-1 text-sm font-medium text-gray-900">{{ $section }}</h3>
                    @foreach ($permissionsInSection as $permission)
                        <div class="flex items-center w-full mb-1">
                            <label class="relative flex items-center gap-2 pr-2 rounded-full cursor-pointer">
                                <input wire:model.defer="listaPermisos" type="checkbox" value="{{ $permission->id }}"
                                    class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-gray-400
                                        hover:border-blue-900 transition-all
                                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9
                                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500
                                        before:opacity-0 before:transition-opacity
                                        focus:ring-0
                                        hover:checked:bg-gray-900 focus:checked:bg-gray-900 checked:border-gray-900 checked:bg-gray-900
                                        checked:before:bg-gray-900 hover:before:opacity-10
                                        after:content-['✔'] after:absolute after:top-2.5 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2
                                        after:text-white after:text-xs after:opacity-0 checked:after:opacity-100" />
                                <span class="text-sm text-gray-900 peer-hover:text-blue-900">
                                    {{ $permission->description }}
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No hay permisos cargados.</p>
    @endif

    <x-slot:footer>
        <button @click="open = false" wire:loading.attr="disabled"
            class="px-4 py-2.5 mr-1 text-xs font-medium text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:cursor-pointer">
            Cancelar
        </button>

        <x-button-gradient color="green" wire:click="guardarPermisos({{ $rol }})" wire:loading.attr="disabled"
            wire:target="guardarPermisos">
            <span wire:loading wire:target="guardarPermisos" class="mr-2">
                <i class="fa fa-spinner fa-spin"></i>
            </span>
            {{ $mostrarPermisos && $rol->permissions()->count() > 0 ? 'Actualizar' : 'Asignar' }}
        </x-button-gradient>
    </x-slot:footer>
</x-sidebar>
