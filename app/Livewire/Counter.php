<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 1;

    public function clicked() {
        dd('hi');
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
