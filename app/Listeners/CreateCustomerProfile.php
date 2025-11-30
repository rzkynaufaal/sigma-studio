<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Auth\Events\Registered;

class CreateCustomerProfile
{
    public function handle(Registered $event)
    {
        $user = $event->user;

        if ($user->role === 'customer' && !$user->customer) {
            Customer::create([
                'user_id' => $user->id,
                'phone'   => null,
                'address' => null,
            ]);
        }
    }
}
