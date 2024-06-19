<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'bergoniawilliam@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'user_name' => 'bergoniawilliam@gmail.com',
            'rank' => 'Sergeant',
            'full_name' => 'John Doe',
            'designation' => 'Admin',
            'user_type' => 'ADMIN',
            'status' => 'Active',
            'profilePic' => 'john_doe.jpg',
            'google2fa_secret' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
