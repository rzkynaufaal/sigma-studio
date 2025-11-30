<?php

namespace App\Actions\Fortify;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role === 'staff') {
            return redirect()->route('staff.dashboard');
        }

        if ($role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('login');
    }
}
