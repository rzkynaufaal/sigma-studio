<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Booking;
use Carbon\Carbon;

class Schedule extends Component
{
    public $todayBookings;
    public $calendar;

    public function mount()
    {
        $staffId = auth()->user()->staff->id;

        // Booking hari ini
        $this->todayBookings = Booking::with(['customer.user', 'service'])
            ->where('staff_id', $staffId)
            ->whereDate('booking_date', Carbon::today())
            ->orderBy('booking_time')
            ->get();

        // Kalender (7 hari ke depan)
        $this->calendar = Booking::with(['service'])
            ->where('staff_id', $staffId)
            ->whereBetween('booking_date', [
                Carbon::today(),
                Carbon::today()->addDays(7)
            ])
            ->get()
            ->groupBy('booking_date')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.staff.schedule')
            ->layout('components.layouts.app');
    }
}
