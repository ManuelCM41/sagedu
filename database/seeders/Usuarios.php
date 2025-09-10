<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Manuel Chunca Mamani',
                'email' => 'directorA@gmail.com',
                // 'colegio_id' => 1,
            ])
            ->assignRole('Super-admin');

        User::factory()
            ->create([
                'name' => 'Frank Grimaldy Chunca Mamani',
                'email' => 'directorB@gmail.com',
                // 'colegio_id' => 2,
            ])
            ->assignRole('Super-admin');

        User::factory()
            ->create([
                'name' => 'Frank Diego Choque Quispe',
                'email' => 'secretarioA@gmail.com',
                // 'colegio_id' => 1,
            ])
            ->assignRole('Secretario(a)');

        User::factory()
            ->create([
                'name' => 'Matias Lopez Luna',
                'email' => 'secretarioB@gmail.com',
                // 'colegio_id' => 2,
            ])
            ->assignRole('Secretario(a)');

        User::factory()
            ->create([
                'name' => 'Docente 01',
                'email' => 'docente01@gmail.com',
                // 'colegio_id' => 1,
            ])
            ->assignRole('Docente');

        User::factory()
            ->create([
                'name' => 'Docente 02',
                'email' => 'docente02@gmail.com',
                // 'colegio_id' => 2,
            ])
            ->assignRole('Docente');

        User::factory()
            ->create([
                'name' => 'Docente 03',
                'email' => 'docente03@gmail.com',
                // 'colegio_id' => 1,
            ])
            ->assignRole('Docente');

        User::factory()
            ->create([
                'name' => 'Docente 04',
                'email' => 'docente04@gmail.com',
                // 'colegio_id' => 2,
            ])
            ->assignRole('Docente');

        User::factory()
            ->create([
                'name' => 'Frank Diego Choque Quispe',
                'email' => 'frankchoque@gmail.com',
                // 'colegio_id' => 1,
            ])
            ->assignRole('Representante');

        User::factory()
            ->create([
                'name' => 'Matias Lopez Luna',
                'email' => 'lopesmatias@gmail.com',
                // 'colegio_id' => 2,
            ])
            ->assignRole('Representante');

        $users = User::factory(18)->create();

        foreach ($users as $user) {
            $user->assignRole('Estudiante');
            // $user->colegio_id = 1;
        }
    }
}
