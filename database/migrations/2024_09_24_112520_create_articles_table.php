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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор
            $table->string('title'); // Название статьи
            $table->string('image')->nullable(); // Картинка статьи (ссылка)
            $table->text('summary'); // Анонс статьи (краткое описание)
            $table->longText('text'); // Текст статьи
            $table->unsignedBigInteger('author_id'); // Внешний ключ на таблицу авторов
            $table->string('slug')->unique()->index(); // Slug для ЧПУ ссылки
            $table->timestamps(); // Дата создания и обновления записи
    
            // Связь с таблицей авторов
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
