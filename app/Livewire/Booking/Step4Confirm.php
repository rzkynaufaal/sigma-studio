<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Service;
use App\Models\User;
use App\Models\Booking;
use App\Models\Customer;

class Step4Confirm extends Component
{
    public $service;
    public $staff;
    public $date;
    public $time;

    public function mount()
    {
        // ambil data dari session
        $this->service = Service::find(session('booking.service_id'));
        $this->staff   = User::find(session('booking.staff_id')); // FIX UTAMA
        $this->date    = session('booking.date');
        $this->time    = session('booking.time');

        // jika ada data hilang → balik ke step 1
        if (!$this->service || !$this->staff || !$this->date || !$this->time) {
            return redirect()->route('booking.step1');
        }
    }

    public function confirm()
{
    $customer = Customer::where('user_id', auth()->id())->first();

    // Generate kode unik untuk QR
    $uniqueCode = 'QR-' . strtoupper(str()->random(10));

    $booking = Booking::create([
        'customer_id'  => $customer->id,
        'staff_id'     => $this->staff->id,
        'service_id'   => $this->service->id,
        'booking_date' => $this->date,
        'booking_time' => $this->time,
        'price'        => $this->service->price,
        'status'       => 'pending',

        // NEW
        'code'         => $uniqueCode,
    ]);

    session()->forget('booking');

        return redirect()
            ->route('customer.bookings.history')
            ->with('success', 'Booking berhasil dibuat! Tunjukkan barcode saat datang ya.');
    }


    public function render()
    {
        return view('livewire.booking.step4-confirm')
            ->layout('components.layouts.app');
    }
}
