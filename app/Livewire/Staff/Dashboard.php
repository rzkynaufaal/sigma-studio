<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Staff;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $todayBookings;
    public $pendingBookings;
    public $completedBookings;
    public $todaySchedule;
    public $bookingsToday;
    public $upcomingBookings;

    public function mount()
    {
        $staff = Staff::where('user_id', auth()->id())->first();

        if (!$staff) {
        $staff = Staff::create([
        'user_id' => auth()->id(),
        'name' => auth()->user()->name
            ]);
        }

        $today = Carbon::today();

        // STATISTIK
        $this->todayBookings = Booking::where('staff_id', $staff->id)
            ->whereDate('booking_date', $today)
            ->count();

        $this->pendingBookings = Booking::where('staff_id', $staff->id)
            ->where('status', 'pending')
            ->count();

        $this->completedBookings = Booking::where('staff_id', $staff->id)
            ->where('status', 'completed')
            ->count();

        // SHIFT STAFF (sementara dummy)
        $this->todaySchedule = "09:00 - 17:00";

        // BOOKING HARI INI
        $this->bookingsToday = Booking::with(['customer.user', 'service'])
            ->where('staff_id', $staff->id)
            ->whereDate('booking_date', $today)
            ->orderBy('booking_time')
            ->get();

        // BOOKING MENDATANG
        $this->upcomingBookings = Booking::with(['customer.user', 'service'])
            ->where('staff_id', $staff->id)
            ->whereDate('booking_date', '>', $today)
            ->orderBy('booking_date')
            ->orderBy('booking_time')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.staff.dashboard')
            ->layout('components.layouts.app');
    }
}
