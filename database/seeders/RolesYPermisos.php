<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesYPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Super-admin']);
        $role2 = Role::create(['name' => 'Administrador(a)']);
        $role3 = Role::create(['name' => 'Secretario(a)']);
        $role4 = Role::create(['name' => 'Representante']);
        $role5 = Role::create(['name' => 'Docente']);
        $role6 = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'ver.bienvenida', 'section' => 'General', 'description' => 'Ver bienvenida'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'ver.reportes', 'section' => 'General', 'description' => 'Ver Reportes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'administrar.perfil', 'section' => 'Configuración', 'description' => 'Administrar perfil personal'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'ver.montos', 'section' => 'Montos', 'description' => 'Ver montos anuales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.monto', 'section' => 'Montos', 'description' => 'Crear monto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'editar.monto', 'section' => 'Montos', 'description' => 'Editar monto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'eliminar.monto', 'section' => 'Montos', 'description' => 'Eliminar monto'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.colegios', 'section' => 'Colegios', 'description' => 'Ver listado de colegios'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear.colegio', 'section' => 'Colegios', 'description' => 'Crear colegio'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.colegio', 'section' => 'Colegios', 'description' => 'Editar colegio'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.colegio', 'section' => 'Colegios', 'description' => 'Eliminar colegio'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.roles', 'section' => 'Roles', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear.rol', 'section' => 'Roles', 'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.rol', 'section' => 'Roles', 'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'asignar_permisos.rol', 'section' => 'Roles', 'description' => 'Asignar permisos al rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.grado_cursos', 'section' => 'Grado y cursos', 'description' => 'Ver listado de cursos asignados'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear.grado_curso', 'section' => 'Grado y cursos', 'description' => 'Crear asignación'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.grado_curso', 'section' => 'Grado y cursos', 'description' => 'Editar asignación'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.cursos', 'section' => 'Cursos', 'description' => 'Ver listado de cursos'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear.curso', 'section' => 'Cursos', 'description' => 'Crear curso'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.curso', 'section' => 'Cursos', 'description' => 'Editar curso'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.niveles', 'section' => 'Niveles', 'description' => 'Ver listado de niveles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.nivel', 'section' => 'Niveles', 'description' => 'Crear nivel'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.nivel', 'section' => 'Niveles', 'description' => 'Editar nivel'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.nivel', 'section' => 'Niveles', 'description' => 'Eliminar nivel'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.grados', 'section' => 'Grados', 'description' => 'Ver listado de grados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.grado', 'section' => 'Grados', 'description' => 'Crear grado'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.grado', 'section' => 'Grados', 'description' => 'Editar grado'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.grado', 'section' => 'Grados', 'description' => 'Eliminar grado'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.colaboradores', 'section' => 'Colaboradores', 'description' => 'Ver listado de colaboradores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.colaborador', 'section' => 'Colaboradores', 'description' => 'Crear colaborador'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.colaborador', 'section' => 'Colaboradores', 'description' => 'Editar colaborador'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.colaborador', 'section' => 'Colaboradores', 'description' => 'Eliminar colaborador'])->syncRoles([$role1]);
        Permission::create(['name' => 'asignar_rol.colaborador', 'section' => 'Colaboradores', 'description' => 'Asignar rol al colaborador'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.representantes', 'section' => 'Representantes', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.representante', 'section' => 'Representantes', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.representante', 'section' => 'Representantes', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.representante', 'section' => 'Representantes', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.estudiantes', 'section' => 'Estudiantes', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.estudiante', 'section' => 'Estudiantes', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.estudiante', 'section' => 'Estudiantes', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.estudiante', 'section' => 'Estudiantes', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver.matriculas', 'section' => 'Matrícula', 'description' => 'Ver listado de matrículas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'crear.matricula', 'section' => 'Matrícula', 'description' => 'Crear matrícula'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'editar.matricula', 'section' => 'Matrícula', 'description' => 'Editar matrícula'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'eliminar.matricula', 'section' => 'Matrícula', 'description' => 'Eliminar matrícula'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'proceso.matricula', 'section' => 'Matrícula', 'description' => 'Realizar matrícula virtual'])->syncRoles([$role4]);

        Permission::create(['name' => 'realizar.pagos', 'section' => 'Pago', 'description' => 'Realizar pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ver.pagos', 'section' => 'Pago', 'description' => 'Ver listado de pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.pago', 'section' => 'Pago', 'description' => 'Crear pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.pago', 'section' => 'Pago', 'description' => 'Editar pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.pago', 'section' => 'Pago', 'description' => 'Eliminar pagos'])->syncRoles([$role1]);

        Permission::create(['name' => 'asignar_rol.usuario', 'section' => 'Usuarios', 'description' => 'Asignar roles al usuario'])->syncRoles([$role1]);
    }
}
