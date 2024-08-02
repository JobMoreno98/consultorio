<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Citas;

class CitaCreateForm extends Form
{
    public $citaId;
    public $paciente_id;
    public $dia;
    public $hora_inicio;
    public $hora_fin;
    public $comentarios;

    public function save()
    {
        Citas::create($this->only('paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios'));
        $this->reset(['paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios']);
    }
    public function edit($citaId)
    {
        $cita = Citas::find($citaId);
        $this->citaId = $citaId;
        $this->paciente_id = $cita->paciente_id;
        $this->dia = $cita->dia;
        $this->hora_inicio = $cita->hora_inicio;
        $this->hora_fin = $cita->hora_fin;
        $this->comentarios = $cita->comentarios;
    }
    public function update()
    {
        $cita = Citas::find($citaId);
        $cita->update($this->only('paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios'));
        $this->reset(['paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios']);
    }
}
