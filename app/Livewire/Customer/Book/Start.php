<?php

namespace App\Livewire\Customer\Book;

use Livewire\Component;

class Start extends Component
{
    public function start()
    {
        return redirect()->route('booking.step1');
    }

    public function render()
    {
        return view('livewire.customer.book.start')
            ->layout('components.layouts.app');
    }
}
