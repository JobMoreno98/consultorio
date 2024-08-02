<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Pacientes;
use App\Livewire\Forms\CitaCreateForm;

class Citas extends Component
{
    public $citas, $date, $hora;
    public $openModal = false;
    public $pacientes;
    public CitaCreateForm $createCita;

    public function mount()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->hora = date('H:i:s');
        $this->date = date('Y-m-d');
        $this->citasAll();
        $this->pacientes = Pacientes::all();
    }
    #[On('create-cita')]
    public function createNewCita($info)
    {
        if (str_contains($info['startStr'], 'T')) {
            $this->createCita->hora_inicio = explode("-",explode('T', $info['startStr'])[1])[0];
            $this->createCita->hora_fin = explode("-",explode('T', $info['endStr'])[1])[0];
        }
        $this->createCita->dia = explode('T', $info['startStr'])[0];
        $this->openModal = true;
    }
    public function closeModal()
    {
        $this->openModal = false;
        $this->citasAll();
        $this->dispatch('refresh');
    }
    public function save()
    {
        $this->createCita->save();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.citas');
    }
    protected function citasAll()
    {
        $this->citas = DB::table('citas_pacientes')->orderBy('dia', 'desc')->orderBy('hora_inicio', 'desc')->get();

        foreach ($this->citas as $key => $value) {
            $value->color = $this->hora > $value->hora_inicio ? 'red' : 'green';
        }
    }
}
