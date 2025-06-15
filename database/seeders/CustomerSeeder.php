<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Customer::create([
        'customer_id' => 'CUST001',
        'name' => 'Nama Customer',
        'email' => 'customer@email.com',
        'password' => bcrypt('password'),
        'phone' => '08123456789',
        'address' => 'Alamat Customer'
    ]);
}
}
