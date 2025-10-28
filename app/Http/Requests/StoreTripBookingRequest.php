<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // allow all authenticated users
    }

    public function rules(): array
    {
        return [
            'challan_bill'   => 'required|string|max:255',
            'load_date'      => 'required|date',
            'unload_date'    => 'required|date|after_or_equal:load_date',
            'load_type'      => 'required|array',
            'unload_type'    => 'required|array',
            'about_good'     => 'nullable|string|max:255',
            'quantity'       => 'nullable|numeric',
            'note'           => 'nullable|string',
            'vehicle_no'     => 'required|string|max:255',
            'vehicle_select' => 'nullable|string|max:255',
            'driver_select'  => 'nullable|string|max:255',
            'helper_select'  => 'nullable|string|max:255',
            'vehicle_type'   => 'nullable|string|max:255',
            'vehicle_size'   => 'nullable|string|max:255',
            'duty'           => 'nullable|string|max:255',
            'client_name'    => 'required|string|max:255',
            'department'     => 'nullable|string|max:255',

            // Supplier Bills Validation
            'supplierBill'                           => 'required|array|min:1',
            'supplierBill.*.supplier_bill'            => 'required|string|max:255',
            'supplierBill.*.supplier_bill_date'       => 'required|date',
            'supplierBill.*.fuel_type'                => 'required|string|max:255',
            'supplierBill.*.fuel_cost'                => 'required|numeric|min:0',
            'supplierBill.*.note'                     => 'nullable|string',

            // Client Bills Validation
            'ClientBill'                              => 'required|array|min:1',
            'ClientBill.*.client_bill'                => 'required|string|max:255',
            'ClientBill.*.client_bill_date'           => 'required|date',
            'ClientBill.*.fuel_type'                  => 'required|string|max:255',
            'ClientBill.*.fuel_cost'                  => 'required|numeric|min:0',
            'ClientBill.*.note'                       => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'challan_bill.required' => 'Challan Bill is required.',
            'load_date.required' => 'Load Date is required.',
            'unload_date.after_or_equal' => 'Unload date must be on or after the load date.',
            'supplierBill.required' => 'At least one supplier bill is required.',
            'ClientBill.required' => 'At least one client bill is required.',
        ];
    }
}
