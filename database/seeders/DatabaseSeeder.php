<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        // Генерация 100 авторов
        \App\Models\Author::factory(100)->create();

        // Генерация 50 категорий
        \App\Models\Category::factory(50)->create();

        // Генерация 10,000 статей
        \App\Models\Article::factory(10000)->create()->each(function ($article) {
            // Присвоение статьи нескольким категориям (от 1 до 3 категорий)
            $categories = \App\Models\Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $article->categories()->attach($categories);
        });
    }
}
