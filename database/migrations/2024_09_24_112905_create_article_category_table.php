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
        Schema::create('article_category', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор
            $table->unsignedBigInteger('article_id'); // Внешний ключ на таблицу статей
            $table->unsignedBigInteger('category_id'); // Внешний ключ на таблицу категорий
            $table->timestamps(); // Дата создания и обновления записи
    
            // Определение внешних ключей
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_category');
    }
};
