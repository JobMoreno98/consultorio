<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Citas as ModelCitas;

class Citas extends Component
{
    public $citas,$date;
    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->citas = ModelCitas::where('dia', $this->date)->get();
    }
    public function render()
    {
        return view('livewire.citas');
    }
}
