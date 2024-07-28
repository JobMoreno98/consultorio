<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pacientes;
use Illuminate\Support\Facades\DB;
use App\Models\Citas;

class CitasCreate extends Component
{
    public $paciente_id, $dia, $hora_inicio, $hora_fin, $comentarios;
    public $createCita = false,
        $updateCita = false;
    public $pacientes;
    public $citas;
    public $cita = [
        'paciente_id' => '',
        'dia' => '',
        'hora_inicio' => '',
        'hora_fin' => '',
        'comentarios' => '',
    ];

    public function mount()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->citas = DB::table('citas_pacientes')->orderBy('dia', 'desc')->orderBy('hora_inicio', 'desc')->get();
        $this->pacientes = Pacientes::all();
    }
    public function save()
    {
        Citas::create($this->only('paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios'));
        $this->reset(['paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios']);
        $this->citas = DB::table('citas_pacientes')->orderBy('dia', 'desc')->orderBy('hora_inicio', 'desc')->get();
        $this->createCita = false;
    }
    public function edit($citaId)
    {
        $cita = Citas::with('paciente')->find($citaId);
        $this->cita['paciente_id'] = $cita->paciente_id;
        $this->cita['dia'] = $cita->dia;
        $this->cita['hora_inicio'] = $cita->hora_inicio;
        $this->cita['hora_fin'] = $cita->hora_fin;
        $this->cita['comentarios'] = $cita->comentarios;
        $this->updateCita = true;
    }
    public function render()
    {
        return view('livewire.citas-create');
    }
}
