<div class="space-y-4">
    <x-page-header route="ver.inicio" icon="fa-solid fa-user" title="Listado de roles" :breadcrumbs="['Home', 'Roles', 'Lista']" />

    @can('crear.rol')
        <x-button-gradient class="w-full sm:w-max" wire:click="create()">
            <i class="fa-solid fa-plus"></i>
            Nuevo
        </x-button-gradient>
    @endcan

    <div class="grid gap-4 mb-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($roles as $index => $r)
            <x-card border_top class="hover:scale-[1.04] duration-300">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-gray-800">{{ $r->name }}</h2>
                        <div class="mb-3 text-xs font-semibold text-gray-500 uppercase">
                            este rol tiene
                        </div>
                        <div class="flex">
                            <div class="mr-2 text-3xl font-bold text-gray-800">
                                {{ $r->permissions()->count() }}
                            </div>
                            <span class="text-xs">
                                permisos <br> en total
                            </span>
                        </div>
                    </div>

                    <x-tag :orden="8" class="px-3 py-4">
                        <i class="fa-solid fa-user-secret fa-2xl fa-fw"></i>
                    </x-tag>

                </div>
                <div class="flex gap-2 mt-4">
                    @can('asignar_permisos.rol')
                        <x-button-gradient color="yellow" wire:click="verPermisos({{ $r }})" class="flex-auto">
                            <i class="fa-solid fa-unlock-keyhole fa-fw"></i>
                            {{ $r->permissions()->count() > 0 ? 'Editar permisos' : 'Asignar permisos' }}
                        </x-button-gradient>
                    @endcan
                    @can('editar.rol')
                        <x-button-gradient color="green" wire:click="edit({{ $r }})" class="flex-auto">
                            <i class="fa-solid fa-pen fa-fw"></i>
                            Editar
                        </x-button-gradient>
                    @endcan
                </div>
            </x-card>
        @endforeach

    </div>

    @include('livewire.sistema.form.permisos')
</div>
