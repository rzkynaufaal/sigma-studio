<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use Carbon\Carbon;

class Step3Schedule extends Component
{
    public $dates = [];
    public $selectedDate = null;
    public $availableTimes = [];

    public function mount()
    {
        if (!session('booking.staff_id')) {
            return redirect()->route('booking.step2');
        }

        // generate 7 hari ke depan
        for ($i = 0; $i < 7; $i++) {
            $this->dates[] = Carbon::today()->addDays($i)->format('Y-m-d');
        }
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;

        // jam yang tersedia
        $times = [
            '09:00', '10:00', '11:00',
            '13:00', '14:00', '15:00', '16:00'
        ];

        // jam yang sudah di booking
        $alreadyBooked = Booking::where('staff_id', session('booking.staff_id'))
            ->where('booking_date', $date)
            ->pluck('booking_time')
            ->toArray();

        // filter jam agar tidak double booking
        $this->availableTimes = array_values(array_filter($times, function ($t) use ($alreadyBooked) {
            return !in_array($t, $alreadyBooked);
        }));
    }

    public function selectTime($time)
    {
        // PENTING! Jangan izinkan waktu dipilih tanpa tanggal
        if (!$this->selectedDate) {
            return back()->with('error', 'Silakan pilih tanggal dulu.');
        }

        // Simpan session booking
        session([
            'booking.date' => $this->selectedDate,
            'booking.time' => $time
        ]);

        // lanjut ke step 4
        return redirect()->route('booking.step4');
    }

    public function render()
    {
        return view('livewire.booking.step3-schedule')
            ->layout('components.layouts.app');
    }
}
