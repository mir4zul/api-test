<?php

namespace App\Http\Controllers;

use App\Models\TripBooking;
use App\Models\SupplierBill;
use App\Models\ClientBill;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTripBookingRequest;
use Illuminate\Container\Attributes\Auth;

class TripBookingController extends Controller
{
    public function store(StoreTripBookingRequest $request)
    {
        DB::beginTransaction();

        try {
            // 1️⃣ Create TripBooking
            $trip = TripBooking::create([
                'user_id'      => 1, // Hardcoded user ID for now
                'challan_bill'   => $request->challan_bill,
                'load_date'      => $request->load_date,
                'unload_date'    => $request->unload_date,
                'load_type'      => json_encode($request->load_type),
                'unload_type'    => json_encode($request->unload_type),
                'about_good'     => $request->about_good,
                'quantity'       => $request->quantity,
                'note'           => $request->note,
                'vehicle_no'     => $request->vehicle_no,
                'vehicle_select' => $request->vehicle_select,
                'driver_select'  => $request->driver_select,
                'helper_select'  => $request->helper_select,
                'vehicle_type'   => $request->vehicle_type,
                'vehicle_size'   => $request->vehicle_size,
                'duty'           => $request->duty,
                'client_name'    => $request->client_name,
                'department'     => $request->department,
            ]);

            // 2️⃣ Insert Supplier Bills
            foreach ($request->supplierBill as $supplier) {
                SupplierBill::create([
                    'trip_booking_id'   => $trip->id,
                    'supplier_bill'     => $supplier['supplier_bill'],
                    'supplier_bill_date' => $supplier['supplier_bill_date'],
                    'fuel_type'         => $supplier['fuel_type'],
                    'fuel_cost'         => $supplier['fuel_cost'],
                    'note'              => $supplier['note'],
                ]);
            }

            // 3️⃣ Insert Client Bills
            foreach ($request->ClientBill as $client) {
                ClientBill::create([
                    'trip_booking_id'   => $trip->id,
                    'client_bill'       => $client['client_bill'],
                    'client_bill_date'  => $client['client_bill_date'],
                    'fuel_type'         => $client['fuel_type'],
                    'fuel_cost'         => $client['fuel_cost'],
                    'note'              => $client['note'],
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Trip booking and bills created successfully!'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
