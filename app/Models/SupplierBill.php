<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TripBooking;

class SupplierBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_booking_id',
        'supplier_bill',
        'supplier_bill_date',
        'fuel_type',
        'fuel_cost',
        'note'
    ];

    public function tripBooking()
    {
        return $this->belongsTo(TripBooking::class);
    }
}
