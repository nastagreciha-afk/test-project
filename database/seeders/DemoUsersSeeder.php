<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'      => 'User',
            'email'     => 'user@example.com',
            'password'  => bcrypt('password'),
            'is_active' => true,
        ]);
    }
}
