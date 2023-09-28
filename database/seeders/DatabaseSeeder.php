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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@wt.com',
            ]);

        \App\Models\LeadStatus::create(
            [
                'id' => 1,
                'label' => 'Initial',
            ], [
                'id' => 2,
                'label' => 'In Work',
            ], [
                'id' => 3,
                'label' => 'Deals',
            ], [
                'id' => 4,
                'label' => 'Archived',
            ]);

        \App\Models\Setting::create(
            [
                'key' => 'mobile-announcement',
                'label' => 'Announcement',
                'value' => fake()->text(),
            ]);
    }
}
