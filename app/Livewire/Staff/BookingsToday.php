<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Staff;
use Carbon\Carbon;

class BookingsToday extends Component
{
    public $bookingsToday;

    public function mount()
    {
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();

        $today = Carbon::today();

        $this->bookingsToday = Booking::with(['customer.user', 'service'])
            ->where('staff_id', $staff->id)
            ->whereDate('booking_date', $today)
            ->whereIn('status', ['pending', 'confirmed']) // HANYA YANG BELUM SELESAI
            ->orderBy('booking_time')
            ->get();
    }

    public function render()
    {
        return view('livewire.staff.bookings-today')
            ->layout('components.layouts.app');
    }
}
