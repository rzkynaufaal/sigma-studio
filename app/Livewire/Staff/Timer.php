<?php

namespace App\Livewire\Staff;

use Livewire\Component;

class Timer extends Component
{
    public $startTime;
    public $elapsed = 0;

    public function mount($startTime)
    {
        $this->startTime = $startTime;
    }

    public function tick()
    {
        $this->elapsed = now()->diffInSeconds($this->startTime);
    }

    public function render()
    {
        return view('livewire.staff.timer');
    }
}
