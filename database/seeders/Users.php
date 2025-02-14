<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name' => 'Ильяс',
           'email' => 'admin@admin.com',
           'password' => Hash::make('123456789'),
           'username' => 'admin',
           'region_id' => 12,
        ]);
        User::create([
           'name' => 'Ильяс',
           'email' => 'aksu@admin.com',
           'password' => Hash::make('123456789'),
           'username' => 'aksu',
           'region_id' => 1,
        ]);
    }
}
