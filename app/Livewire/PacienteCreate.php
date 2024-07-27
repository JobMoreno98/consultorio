<?php namespace App\Livewire;

use Livewire\Component;
use App\Models\Pacientes;
use Livewire\Attributes\Rule;

class PacienteCreate extends Component
{
    #[Rule('required', as: 'Nombre')]
    public $nombre;
    #[Rule('required', as: 'Domicilio')]
    public $domicilio;
    #[Rule('required', as: 'Teléfono')]
    public $telefono;
    #[Rule('required|date', as: 'Fecha de Nacimiento')]
    public $fecha_nacimiento;
    #[Rule('required')]
    public $comentarios;

    public $pacientes,
        $openModal = false,
        $showModal = false,
        $createUser = false;

    public $pacienteEditId;

    public $pacienteInfo = [
        'nombre' => '',
        'domicilio' => '',
        'telefono' => '',
        'fecha_nacimiento' => '',
        'comentarios' => '',
    ];

    public function save()
    {
        $this->validate();
        $paciente = Pacientes::create($this->only('nombre', 'domicilio', 'telefono', 'fecha_nacimiento', 'comentarios'));
        $this->reset(['nombre', 'domicilio', 'telefono', 'fecha_nacimiento', 'comentarios']);
        $this->createUser = false;
        $this->pacientes = Pacientes::all();
    }
    public function edit($pacienteId)
    {
        $this->openModal = true;
        $paciente = Pacientes::find($pacienteId);
        $this->pacienteEditId = $paciente->id;
        $this->pacienteInfo['nombre'] = $paciente->nombre;
        $this->pacienteInfo['domicilio'] = $paciente->domicilio;
        $this->pacienteInfo['fecha_nacimiento'] = $paciente->fecha_nacimiento;
        $this->pacienteInfo['telefono'] = $paciente->telefono;
        $this->pacienteInfo['comentarios'] = $paciente->comentarios;
    }
    public function update()
    {
        $paciente = Pacientes::find($this->pacienteEditId);
        $paciente->update([
            'nombre' => $this->pacienteInfo['nombre'],
            'domicilio' => $this->pacienteInfo['domicilio'],
            'telefono' => $this->pacienteInfo['telefono'],
            'fecha_nacimiento' => $this->pacienteInfo['fecha_nacimiento'],
            'comentarios' => $this->pacienteInfo['comentarios'],
        ]);
        $this->reset(['nombre', 'domicilio', 'telefono', 'fecha_nacimiento', 'comentarios']);
        $this->pacientes = Pacientes::all();
        $this->openModal = false;
    }

    public function destroy($pacienteId)
    {
        $paciente = Pacientes::find($pacienteId);
        $paciente->delete();
        $this->pacientes = Pacientes::all();
    }
    public function show($pacienteId)
    {
        $this->showModal = true;
        $paciente = Pacientes::find($pacienteId);
        $this->pacienteEditId = $paciente->id;
        $this->pacienteInfo['nombre'] = $paciente->nombre;
        $this->pacienteInfo['domicilio'] = $paciente->domicilio;
        $this->pacienteInfo['fecha_nacimiento'] = $paciente->fecha_nacimiento;
        $this->pacienteInfo['telefono'] = $paciente->telefono;
        $this->pacienteInfo['comentarios'] = $paciente->comentarios;
    }

    public function render()
    {
        return view('livewire.paciente-create');
    }
    public function mount()
    {
        $this->pacientes = Pacientes::all();
    }
}
