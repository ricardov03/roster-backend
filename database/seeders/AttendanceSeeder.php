<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendances')->insert([
            [
                'section_id' => 1,
                'date' => '2023-06-01',
            ],
            [
                'section_id' => 1,
                'date' => now()->toDate(),
            ],
        ]);
    }
}
