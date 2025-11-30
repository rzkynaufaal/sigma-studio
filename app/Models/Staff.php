<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Booking;

class Staff extends Model
{
    protected $fillable = [
        'user_id',
        'skills',
        'experience_years',
    ];

    /**
     * Relasi: Staff dimiliki oleh User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Staff punya banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
