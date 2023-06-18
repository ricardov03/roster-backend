<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            ['id' => 1, 'name' => 'Administrator'],
            ['id' => 2, 'name' => 'Professor'],
            ['id' => 3, 'name' => 'Student'],
        ]);
    }
}
