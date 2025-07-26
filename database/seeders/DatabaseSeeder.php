<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Dennis',
            'email' => 'hey@denniskoch.dev',
        ]);

        User::factory()->create([
            'name' => 'Marius',
            'email' => 'marius@example.org',
        ]);

        User::factory()->create([
            'name' => 'Tanja',
            'email' => 'tanja@example.org',
        ]);

        User::factory()->create([
            'name' => 'Ed',
            'email' => 'ed@example.org',
        ]);

        User::factory()->create([
            'name' => 'Ives',
            'email' => 'ives@example.org',
        ]);

        User::factory()->create([
            'name' => 'Silvan',
            'email' => 'silvan@example.org',
        ]);

        User::factory()->create([
            'name' => 'Francesco',
            'email' => 'francesco@example.org',
        ]);

        User::factory()->create([
            'name' => 'Stefan',
            'association' => true,
            'email' => 'stefan@example.org',
        ]);

        User::factory()->create([
            'name' => 'Sandro',
            'association' => true,
            'email' => 'sandro@example.org',
        ]);

        User::factory()->create([
            'name' => 'Philipp',
            'association' => true,
            'email' => 'philipp@example.org',
        ]);

        User::factory()->create([
            'name' => 'Sascha',
            'association' => true,
            'email' => 'sascha@example.org',
        ]);

        User::factory()->create([
            'name' => 'Jan',
            'association' => true,
            'email' => 'jan@example.org',
        ]);


        Post::create(['title' => 'Test', 'author_id' => 1]);
    }
}
