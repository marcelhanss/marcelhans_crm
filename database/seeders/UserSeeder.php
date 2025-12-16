<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Marcel',
            'email' => 'sales@ptsmart.test',
            'password' => Hash::make('sales'),
            'role' => 'sales',
        ]);
        User::create([
            'name' => 'Hans',
            'email' => 'manager@ptsmart.test',
            'password' => Hash::make('manager'),
            'role' => 'manager',
        ]);
    }
}
