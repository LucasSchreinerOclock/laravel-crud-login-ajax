<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                    'name' => 'Nicole',
                    'email' => 'nicole@oclock.io',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => 'John Doe',
                    'email' => 'john@doe.com',
                    'password' => Hash::make('motdePasse4xxxsz'),
                ]
         ]);
    }
}
