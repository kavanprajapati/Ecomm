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
            "name"=>"Kavan Prajapati",
            "email"=>"kavan@test.com",
            "password"=>Hash::make("Kavan@123")
        ]);

    }
}
