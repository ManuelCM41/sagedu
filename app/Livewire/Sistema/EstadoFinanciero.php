<?php

namespace App\Livewire\Sistema;

use Livewire\Component;

class EstadoFinanciero extends Component
{
    public $selectedEntidad = null;
    public $selectedAlumno = null;
    public $selectedAño = null;

    public $entidad = [];
    public $alumnos = [];
    public $años = [];

    protected $listeners = [
        'entidadChanged' => 'updateEntidad',
        'alumnoChanged' => 'updateAlumno',
        'añoChanged' => 'updateAño',
    ];

    public function mount()
    {
        $this->entidad = [
            ['label' => 'UPeU', 'value' => '111111'],
            ['label' => 'UNAJ', 'value' => '222222'],
        ];
        $this->alumnos = [
            ['label' => "Jose Daniel Rorigues Peralta", 'value' => "78495948"],
            ['label' => "Fernando Rodrigues Peralta", 'value' => "78486936"],
            ['label' => "Todos", 'value' => "todos"],
        ];
        $this->años = [
            ['label' => '2025', 'value' => '2025'],
            ['label' => '2024', 'value' => '2024'],
            ['label' => '2023', 'value' => '2023'],
            ['label' => '2022', 'value' => '2022'],
        ];
    }

    public function render()
    {
        return view('livewire.sistema.estado-financiero');
    }

    public function updateEntidad($value)
    {
        $this->selectedEntidad = $value;
    }

    public function updateAlumno($value)
    {
        $this->selectedAlumno = $value;
    }

    public function updateAño($value)
    {
        $this->selectedAño = $value;
    }
}
