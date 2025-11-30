<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Booking;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalBookings;
    public $activeBookings;
    public $completedBookings;
    public $upcoming;
    public $recent;

    public function mount()
    {
        $customer = Customer::where('user_id', auth()->id())->firstOrFail();

        // TOTAL booking
        $this->totalBookings = Booking::where('customer_id', $customer->id)->count();

        // Booking aktif
        $this->activeBookings = Booking::where('customer_id', $customer->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        // Booking selesai
        $this->completedBookings = Booking::where('customer_id', $customer->id)
            ->where('status', 'completed')
            ->count();

        // Booking mendatang (3 terdekat)
        $this->upcoming = Booking::with(['service', 'staff'])
            ->where('customer_id', $customer->id)
            ->whereDate('booking_date', '>=', Carbon::today())
            ->orderBy('booking_date')
            ->orderBy('booking_time')
            ->limit(3)
            ->get();

        // Riwayat terakhir (3 terbaru)
        $this->recent = Booking::with(['service', 'staff'])
            ->where('customer_id', $customer->id)
            ->where('status', 'completed')
            ->latest()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.customer.dashboard')
            ->layout('components.layouts.app');
    }
}
