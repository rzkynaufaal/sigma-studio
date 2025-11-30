<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Booking;

class Reviews extends Component
{
    public $reviews;

    public function mount()
    {
        // Pastikan user punya relasi staff
        $staff = auth()->user()->staff;

        // Jika bukan staff → redirect daripada crash
        if (!$staff) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Anda bukan staff, akses ditolak.');
        }

        // Load semua review terkait staff
        $this->reviews = Booking::with(['service', 'customer.user'])
            ->where('staff_id', $staff->id)
            ->whereNotNull('rating')
            ->orderByDesc('updated_at')
            ->get();
    }

    // Di Staff/Reviews.php (Livewire Component)
public function render()
{
    return view('livewire.staff.reviews', [
        'reviews' => \App\Models\Booking::whereNotNull('rating')
                      ->with(['service', 'customer.user'])
                      ->orderBy('updated_at', 'desc')
                      ->paginate(10) // ← Ini yang membuat hasPages() available
    ]);
}
}
