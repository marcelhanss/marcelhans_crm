<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\User;
class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = User::where('role', 'sales')->first();

        Lead::create([
            'name' => 'PT Marcel Hans',
            'email' => 'marcel@customer.test',
            'user_id' => $sales->id,
        ]);

        Lead::create([
            'name' => 'CV Hans Network',
            'email' => 'hans@customer.test',
            'user_id' => $sales->id,
        ]);
    }
}
