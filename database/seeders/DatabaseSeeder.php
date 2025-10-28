<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\TripBooking;
use App\Models\SupplierBill;
use App\Models\ClientBill;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // tickets factory
        Ticket::factory(10)->create();

        // trip booking factory
        // TripBooking::factory(10)
        //     ->has(SupplierBill::factory(10))
        //     ->has(ClientBill::factory(10))
        //     ->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
