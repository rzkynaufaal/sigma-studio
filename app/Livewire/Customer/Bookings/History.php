<?php

namespace App\Livewire\Customer\Bookings;

use Livewire\Component;
use App\Models\Booking;

class History extends Component
{
    public $bookings;

    public $selectedId = null;
    public $rating = null;
    public $review = null;

    public function mount()
    {
        $this->bookings = auth()->user()->customer->bookings()
            ->with(['service', 'staff'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function openReview($bookingId)
    {
        // If already open then close
        if ($this->selectedId === $bookingId) {
            $this->selectedId = null;
            return;
        }

        $booking = Booking::find($bookingId);

        $this->selectedId = $bookingId;
        $this->rating = $booking->rating;
        $this->review = $booking->review;
    }

    public function saveReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:300',
        ]);

        Booking::find($this->selectedId)->update([
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        $this->selectedId = null;

        session()->flash('success', 'Review berhasil disimpan! 🎉');
    }

    public function render()
    {
        return view('livewire.customer.bookings.history');
    }
}
