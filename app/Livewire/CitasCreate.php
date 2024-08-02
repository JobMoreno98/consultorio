<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pacientes;
use Illuminate\Support\Facades\DB;
use App\Models\Citas;
use App\Livewire\Forms\CitaCreateForm;

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
    public CitaCreateForm $citaEdit;

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
        $this->citaEdit->edit($citaId);
        $this->updateCita = true;
    }
    public function delete()
    {
        $id = $this->citaEdit->citaId;
        $cita = Citas::find($id);
        $cita->delete();
        $this->citas = DB::table('citas_pacientes')->orderBy('dia', 'desc')->orderBy('hora_inicio', 'desc')->get();
        $this->updateCita = false;
    }
    public function render()
    {
        return view('livewire.citas-create');
    }
}
