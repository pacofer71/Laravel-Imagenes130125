<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        //por si reprito los seedeers borrar las imagenes antiguas
        Storage::deleteDirectory('images/articles');
        //Creo la estructura de directorios requerida
        Storage::makeDirectory('images/articles');

        Article::factory(15)->create();



    }
}
