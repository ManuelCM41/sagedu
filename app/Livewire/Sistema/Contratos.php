<?php

namespace App\Livewire\Sistema;

use Livewire\Component;

class Contratos extends Component
{
    public $abrirContrato = false;

    public $selectedPeriodo = null;
    public $selectedContrato = null;

    public $periodos = [];
    public $contratos = [];

    protected $listeners = [
        'periodoChanged' => 'updatePeriodo',
        'contratoChanged' => 'updateContrato',
    ];

    public function mount()
    {
        $this->periodos = [
            ['label' => "Regular 2025-1", 'value' => "2025-1"],
            ['label' => "Regular 2024-2", 'value' => "2024-2"],
            ['label' => "Regular 2024-1", 'value' => "2024-1"],
            ['label' => "Regular 2023-2", 'value' => "2023-2"],
            ['label' => "Todos", 'value' => "todos"],
        ];

        $this->contratos = [
            ['label' => "Regular 2025-1-2160008", 'value' => "2160008"],
            ['label' => "Regular 2024-2-2160009", 'value' => "2160009"],
            ['label' => "Todos", 'value' => "todos"],
        ];
    }

    public function render()
    {
        return view('livewire.sistema.contratos');
    }

    public function abrir()
    {
        $this->abrirContrato = true;
    }

    public function updatePeriodo($value)
    {
        $this->selectedPeriodo = $value;
    }

    public function updateContrato($value)
    {
        $this->selectedContrato = $value;
    }
}
