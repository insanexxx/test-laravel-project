<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence; // Генерация случайного предложения для названия статьи

        return [
            'title' => $title, // Название статьи
            'image' => $this->faker->imageUrl(640, 480, 'business'), // Ссылка на случайное изображение
            'summary' => $this->faker->text(200), // Анонс статьи (короткий текст)
            'text' => $this->faker->paragraphs(5, true), // Основной текст статьи (несколько параграфов)
            'author_id' => Author::inRandomOrder()->first()->id, // Случайный автор статьи
            'slug' => Str::slug($title), // Slug для ЧПУ
        ];
    }
}
