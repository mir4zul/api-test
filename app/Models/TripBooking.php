<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SupplierBill;
use App\Models\ClientBill;

class TripBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'challan_bill',
        'load_date',
        'unload_date',
        'load_type',
        'unload_type',
        'about_good',
        'quantity',
        'note',
        'vehicle_no',
        'vehicle_select',
        'driver_select',
        'helper_select',
        'vehicle_type',
        'vehicle_size',
        'duty',
        'client_name',
        'department',
    ];

    protected $casts = [
        'load_type' => 'array',
        'unload_type' => 'array',
    ];

    public function supplierBills()
    {
        return $this->hasMany(SupplierBill::class);
    }

    public function clientBills()
    {
        return $this->hasMany(ClientBill::class);
    }
}
