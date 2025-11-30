<?php

namespace App\Livewire\Customer\Services;

use Livewire\Component;
use App\Models\Service;

class Index extends Component
{
    public function render()
{
    return view('livewire.customer.services.index', [
        'services' => Service::where('status', 'active')
                            ->orderBy('id', 'desc')
                            ->get(),
    ])->layout('components.layouts.app');
}

}

