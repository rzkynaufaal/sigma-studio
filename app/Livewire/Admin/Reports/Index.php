<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Service;
use Carbon\Carbon;

class Index extends Component
{
    public $month;
    public $year;

    public $monthsList;
    public $yearsList;

    public function mount()
    {
        // default bulan & tahun sekarang
        $this->month = now()->month;
        $this->year  = now()->year;

        $this->monthsList = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 
            4 => 'April',   5 => 'Mei',      6 => 'Juni',
            7 => 'Juli',    8 => 'Agustus',  9 => 'September',
            10 => 'Oktober',11 => 'November',12 => 'Desember'
        ];

        // daftar tahun dari 3 tahun terakhir
        $this->yearsList = collect(range(now()->year, now()->year - 3));
    }

    public function render()
    {
        $start = Carbon::create($this->year, $this->month, 1)->startOfMonth();
        $end   = $start->copy()->endOfMonth();

        // booking completed dalam range
        $bookings = Booking::with(['customer.user', 'service'])
            ->where('status', 'completed')
            ->whereBetween('booking_date', [$start->toDateString(), $end->toDateString()])
            ->orderBy('booking_date')
            ->get();

        // total pendapatan
        $totalRevenue = $bookings->sum('price');

        // layanan terlaris
        $topServices = Booking::select('service_id')
            ->where('status', 'completed')
            ->whereBetween('booking_date', [$start->toDateString(), $end->toDateString()])
            ->with('service')
            ->get()
            ->groupBy('service_id')
            ->map(fn($x) => $x->count())
            ->sortDesc();

        return view('livewire.admin.reports.index', [
            'bookings'      => $bookings,
            'totalRevenue'  => $totalRevenue,
            'topServices'   => $topServices,
        ]);
    }
}
