<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        $user = User::factory()->create([
            'name' => 'Milos Trajkovic',
            'email' => 'milostrajkovic@gmail.com',
            'role' => 'librarian'
        ]);

        $author = Author::factory()->create([
            'name' => 'Nikola',
            'surname' => 'Petrovic',
            'email' => 'nikolapetrovic@gmail.com',
        ]);

        Book::factory(10)->create([
            'user_id' => $user->id,
            'author_id' => $author->id
        ]);
    }
}
