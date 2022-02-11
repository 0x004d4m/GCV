<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_status')->insert([
            'id' => 1,
            'status' => 'Not Used'
        ]);
        DB::table('card_status')->insert([
            'id' => 2,
            'status' => 'Used'
        ]);
        DB::table('balance_status')->insert([
            'id' => 1,
            'status' => 'Pending'
        ]);
        DB::table('balance_status')->insert([
            'id' => 2,
            'status' => 'Approved'
        ]);
        DB::table('balance_status')->insert([
            'id' => 3,
            'status' => 'Rejected'
        ]);
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gcv.com',
            'password' => Hash::make('Admin1234')
        ]);
    }
}
