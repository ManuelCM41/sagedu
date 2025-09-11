<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Sistema\Contratos;
use App\Livewire\Sistema\EstadoFinanciero;
use App\Livewire\Sistema\Roles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('panel-de-control/sistema')->middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/pagina/inicio', Roles::class)->middleware('can:ver.roles')->name('ver.inicio');
    Route::get('/pagina/seguridad/roles', Roles::class)->middleware('can:ver.roles')->name('ver.roles');

    Route::get('/pagina/contratos/', Contratos::class)->middleware('can:ver.roles')->name('ver.contratos');
    Route::get('/pagina/estado-financiero/', EstadoFinanciero::class)->middleware('can:ver.roles')->name('ver.estado_financiero');

    Route::fallback(function () {
        return view('pages/404');
    });
});

require __DIR__ . '/auth.php';
