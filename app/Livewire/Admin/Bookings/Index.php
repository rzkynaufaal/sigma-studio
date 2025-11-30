<?php

namespace App\Livewire\Admin\Bookings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Booking;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $selectedReview = null;

    protected $listeners = ['refreshReview' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function showReview($id)
    {
        $this->selectedReview = Booking::with([
            'customer.user',
            'staff.user',
            'service'
        ])->find($id);

        // trigger front-end
        $this->dispatch('review-loaded');
    }

    public function render()
    {
        $bookings = Booking::with(['customer.user', 'staff.user', 'service'])
            ->when($this->search, function ($q) {
                $q->whereHas('customer.user', function ($q2) {
                    $q2->where('name', 'LIKE', "%{$this->search}%");
                });
            })
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.admin.bookings.index', compact('bookings'))
            ->layout('components.layouts.app');
    }
}
