<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Booking;
use Carbon\Carbon;

class BookingProcess extends Component
{
    public $booking;
    public $started_at;
    public $extra_price = 0;
    public $note = '';

    public $checklist = [];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;

        if (!$booking->started_at) {
            $booking->update([
                'started_at' => Carbon::now()
            ]);
        }

        $this->started_at = $booking->started_at;

        // load checklist existing (atau default baru)
        $this->checklist = $booking->checklist ?? [
            false, false, false, false, false
        ];

        $this->extra_price = $booking->extra_price ?? 0;
        $this->note = $booking->note ?? '';
    }

    public function toggleChecklist($index)
    {
        if (!isset($this->checklist[$index])) {
            return;
        }

        $this->checklist[$index] = !$this->checklist[$index];

        // simpan ke DB setiap toggle
        $this->booking->update([
            'checklist' => $this->checklist
        ]);
    }

    public function finish()
    {
        $this->booking->update([
            'status'       => 'completed',
            'finished_at'  => Carbon::now(),
            'extra_price'  => $this->extra_price,
            'note'         => $this->note,
            'checklist'    => $this->checklist,

            // buat nomor invoice
    'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . strtoupper(str()->random(5)),
        ]);

        return redirect()
            ->route('staff.dashboard')
            ->with('success', 'Servis berhasil diselesaikan!');
    }

    public function render()
    {
        return view('livewire.staff.booking-process')
            ->layout('components.layouts.app');
    }
}
