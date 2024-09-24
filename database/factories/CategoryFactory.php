<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->word; // Генерация уникального слова для названия категории

        return [
            'title' => ucfirst($title), // Название категории с заглавной буквы
            'slug' => $this->generateUniqueSlug($title), // Генерация уникального slug
            'parent_id' => null, // Корневая категория (без родителя)
        ];
    }

    /**
     * Генерация уникального slug.
     *
     * @param string $title
     * @return string
     */
    private function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title); // Генерируем обычный slug
        $count = Category::where('slug', 'like', "$slug%")->count(); // Проверяем количество похожих slug

        return $count ? "{$slug}-{$count}" : $slug; // Если slug уже существует, добавляем к нему число
    }
}
