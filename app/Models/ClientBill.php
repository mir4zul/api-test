<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_booking_id',
        'client_bill',
        'client_bill_date',
        'fuel_type',
        'fuel_cost',
        'note'
    ];

    public function tripBooking()
    {
        return $this->belongsTo(TripBooking::class);
    }
}
