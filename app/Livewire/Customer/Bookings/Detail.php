<?php

namespace App\Livewire\Customer\Bookings;

use Livewire\Component;
use App\Models\Booking;

class Detail extends Component
{
    public $booking;

    public function mount(Booking $booking)
    {
        // Pastikan hanya pemilik booking yang boleh melihat
        if ($booking->customer->user_id !== auth()->id()) {
            abort(403);
        }

        $this->booking = $booking;
    }

    public function render()
    {
        return view('livewire.customer.bookings.detail')
            ->layout('components.layouts.app');
    }
}
