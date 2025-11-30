<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Customer;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $weeklyBookings;
    public $weeklyRevenue;
    public $pendingBookings;
    public $totalCustomers;
    public $topServices;
    public $todayStaff;
    public $recentBookings;

    public $labels = [];
    public $data = [];

    public function mount()
    {
        /**
         * ==========================
         *    RANGE PEKAN INI
         * ==========================
         */
        $start = now()->subDays(6)->startOfDay(); // 7 hari terakhir
        $end   = now()->endOfDay();


        /**
         * ==========================
         *     STATISTIK PEKAN INI
         * ==========================
         */

        // Total Booking 7 hari terakhir
        $this->weeklyBookings = Booking::whereBetween('created_at', [$start, $end])->count();

        // Total Pendapatan 7 hari terakhir (status completed)
        $this->weeklyRevenue = Booking::whereBetween('created_at', [$start, $end])
            ->where('status', 'completed')
            ->sum('price');

        // Booking Pending (all)
        $this->pendingBookings = Booking::where('status', 'pending')->count();

        // Total pelanggan
        $this->totalCustomers = Customer::count();

        // Top 5 layanan terlaris
        $this->topServices = Service::select('services.id', 'services.name')
            ->leftJoin('bookings', 'bookings.service_id', '=', 'services.id')
            ->selectRaw('COUNT(bookings.id) as total')
            ->groupBy('services.id', 'services.name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Staff (dummy shift sementara)
        $this->todayStaff = Staff::limit(3)->get()
            ->map(fn($staff) => (object)[
                'name'  => $staff->name,
                'shift' => '09:00 - 17:00',
            ]);

        // 5 booking terbaru
        $this->recentBookings = Booking::with(['customer', 'service'])
            ->latest()
            ->limit(5)
            ->get();


        /**
         * ==========================
         *   GRAFIK BOOKING 7 HARI
         * ==========================
         */

        $dates = collect(range(6, 0))->map(fn($i) => now()->subDays($i)->format('Y-m-d'));

        // Label grafik → contoh: 12 Jan, 13 Jan, dst
        $this->labels = $dates->map(fn($date) =>
            Carbon::parse($date)->format('d M')
        );

        // Data grafik → jumlah booking per hari
        $this->data = $dates->map(fn($date) =>
            Booking::whereDate('created_at', $date)->count()
        );
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'labels' => $this->labels,
            'data'   => $this->data,
        ]);
    }
}
