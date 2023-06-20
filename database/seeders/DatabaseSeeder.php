<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // "user_types" Table
        $this->command->info("The 'user_types' table it's going to be seeded with all the required user types.");
        $this->call(UserTypeSeeder::class);
        $this->command->info("The 'user_types' table successfully seeded.");

        // "users" Table
        $this->command->newLine();
        $this->command->info("The 'users' table it's going to be seeded with all the required users.");
        $this->command->info('Creating Administrator users...');
        $this->call(AdminUsersSeeder::class);
        $this->command->info('Creating Teacher users...');
        $this->call(TeacherUsersSeeder::class);
        $this->command->info('Creating Student users...');
        $this->call(StudentUsersSeeder::class);
        $this->command->info("The 'users' table successfully seeded.");

        // "user_user_type" Table
        $this->command->info("The 'user_user_type' table it's going to be seeded with all the required user and user types relations.");
        $this->call(UserUserTypeRelationSeeder::class);
        $this->command->info("The 'user_user_type' table successfully seeded.");

        // "courses" Table
        $this->command->info("The 'courses' table it's going to be seeded with all the existed courses.");
        $this->call(CourseSeeder::class);
        $this->command->info("The 'courses' table successfully seeded.");

        // "sections" Table
        $this->command->info("The 'sections' table it's going to be seeded with all the required course and instructor relations.");
        $this->call(SectionSeeder::class);
        $this->command->info("The 'sections' table successfully seeded.");

        // "roster" Table
        $this->command->info("The 'rosters' table it's going to be seeded with all the required sections and students relations.");
        $this->call(RosterSeeder::class);
        $this->command->info("The 'rosters' table successfully seeded.");

        // "attendance" Table
        $this->command->info("The 'attendance' table it's going to be seeded with all the attendances.");
        $this->call(AttendanceSeeder::class);
        $this->command->info("The 'attendance' table successfully seeded.");
    }
}
