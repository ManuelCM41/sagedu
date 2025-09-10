<?php

namespace App\Livewire\Sistema;

use Livewire\Component;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class Roles extends Component
{
    use Toastable;

    public $mostrarPermisos = false;
    public $rolId, $rol;
    public $listaPermisos = [];

    public function render()
    {
        $roles = Role::all();
        $permisos = Permission::all()->groupBy('section');
        return view('livewire.sistema.roles', compact('roles', 'permisos'));
    }

    public function verPermisos(Role $rolSelec)
    {
        $this->rol = $rolSelec;
        $this->listaPermisos = $rolSelec->permissions->pluck('id')->toArray();
        $this->mostrarPermisos = true;
    }

    public function guardarPermisos(Role $rolSelec)
    {
        $isNewAssignment = $rolSelec->permissions()->count() === 0;

        if ($isNewAssignment && empty($this->listaPermisos)) {
            $this->error('No se puede asignar permisos vacíos');
        } else {
            $rolSelec->permissions()->sync($this->listaPermisos);
            app()[PermissionRegistrar::class]->forgetCachedPermissions();
            if ($isNewAssignment && $this->listaPermisos) {
                $this->success('Se asignó correctamente los permisos');
            } else if (!$isNewAssignment) {
                $this->success('Se actualizó correctamente los permisos');
            }
        }

        $this->reset(['mostrarPermisos', 'rol']);
    }
}
