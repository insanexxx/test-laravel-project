<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullName = $this->faker->name; // Генерация случайного ФИО

        return [
            'full_name' => $fullName, // Полное имя автора
            'avatar' => $this->faker->imageUrl(200, 200, 'people'), // Ссылка на случайное изображение (аватар)
            'birth_year' => $this->faker->year, // Случайный год рождения
            'bio' => $this->faker->paragraph, // Случайная биография
            'slug' => Str::slug($fullName) // Slug из ФИО (для ЧПУ)
        ];
    }
}