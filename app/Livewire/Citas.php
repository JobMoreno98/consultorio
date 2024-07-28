<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Citas extends Component
{
    public $citas, $date, $hora;
    public function mount()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->hora = date('H:i:s');
        $this->date = date('Y-m-d');
        $this->citas = DB::table('citas_pacientes')
            ->where('dia', $this->date)
            ->orderBy('dia', 'desc')
            ->orderBy('hora_inicio', 'desc')
            ->get();
            
    }
    public function render()
    {
        return view('livewire.citas');
    }
}
