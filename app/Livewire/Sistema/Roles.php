<?php

namespace App\Livewire\Sistema;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use Toastable;

    public $mostrarPermisos = false;
    public $crearEditarRol = false;
    public $rol;
    public $listaPermisos = [];

    #[Rule('required|min:3')]
    public $nombre;

    public function render()
    {
        $roles = Role::all();
        $permisos = Permission::all()->groupBy('section');
        return view('livewire.sistema.roles', compact('roles', 'permisos'));
    }

    public function crear()
    {
        $this->reset('rol', 'nombre');
        $this->crearEditarRol = true;
    }

    public function guardar()
    {
        $this->validate();
        if (!isset($this->rol)) {
            $r = Role::create(['name' => $this->nombre, 'guard_name' => 'web']);
            $this->success('Rol creado correctamente');
        } else {
            $this->rol->update(['name' => $this->nombre]);
            $this->success('Rol actualizado correctamente');
        }
        $this->reset(['crearEditarRol', 'rol']);
    }

    public function editar(Role $rolSelec)
    {
        $this->reset('rol', 'nombre');
        $this->crearEditarRol = true;
        $this->rol = $rolSelec;
        $this->nombre = $rolSelec->name;
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
            if ($isNewAssignment && $this->listaPermisos) {
                $this->success('Se asignó correctamente los permisos');
            } else if (!$isNewAssignment) {
                $this->success('Se actualizó correctamente los permisos');
            }
        }

        $this->reset(['mostrarPermisos', 'rol']);
    }
}
