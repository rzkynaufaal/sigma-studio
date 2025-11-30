<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Staff;   // <- GANTI ke MODEL STAFF bukan User

class Step2Staff extends Component
{
    public $staff;

    public function mount()
    {
        if (!session('booking.service_id')) {
            return redirect()->route('booking.step1');
        }

        // AMBIL LANGSUNG DARI TABEL STAFF
        $this->staff = Staff::all();
    }

    public function selectStaff($staffId)
    {
        // Simpan ID staff yang benar (tabel staff.id)
        session(['booking.staff_id' => $staffId]);

        return redirect()->route('booking.step3');
    }

    public function render()
    {
        return view('livewire.booking.step2-staff')
            ->layout('components.layouts.app');
    }
}
