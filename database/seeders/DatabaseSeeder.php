<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Post::factory(500)->create();

        User::factory()->create([
            'name' => 'Juan Chuc',
            'email' => 'juaachuc@uacam.mx',
            'password' => Hash::make('pepitoconejo'),
        ]);
    }
}
