<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Service;

class Step1Service extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::where('status', 'active')->get();
    }

    public function selectService($serviceId)
    {
        session(['booking.service_id' => $serviceId]);
        return redirect()->route('booking.step2');
    }

    public function render()
    {
        return view('livewire.booking.step1-service')
            ->layout('components.layouts.app');
    }
}
