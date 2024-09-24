<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор
            $table->string('full_name'); // Имя автора
            $table->string('avatar')->nullable(); // Аватар автора (ссылка на картинку)
            $table->year('birth_year'); // Год рождения
            $table->text('bio'); // Биография автора
            $table->string('slug')->unique()->index(); // Slug для ЧПУ ссылки (например, john-doe)
            $table->timestamps(); // Дата создания и обновления записи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
