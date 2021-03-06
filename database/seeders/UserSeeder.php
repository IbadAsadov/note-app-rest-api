<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        for ($i = 1; $i < 16; $i++){
            DB::table("users")->insert([
                "name" => "User ".$i,
                "email" => "dev".$i."@gmail.com",
                "password" => Hash::make("123456789"),
                "created_by" => 1,
                "created_at" => Carbon::now(),
            ]);

        }
    }
}
