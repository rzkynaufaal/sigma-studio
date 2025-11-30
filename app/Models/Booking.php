<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'staff_id',
        'service_id',
        'booking_date',
        'booking_time',
        'status',
        'is_paid',
        'price',
        'voucher_id',

        // Review langsung disimpan di tabel bookings
        'rating',
        'review',

        // QR & Invoice
        'code',
        'invoice_number',

        // Proses servis
        'extra_price',
        'note',
        'checklist',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'checklist'    => 'array',
        'booking_date' => 'date',
        'started_at'   => 'datetime',
        'finished_at'  => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}
