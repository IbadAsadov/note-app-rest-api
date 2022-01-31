<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 16; $i++){
            DB::table("notes")->insert([
                "title" => "Note ".$i,
                "text" => Lorem::text(100),
                "created_by" => $i,
                "created_at" => Carbon::now(),
            ]);
        }

    }
}
