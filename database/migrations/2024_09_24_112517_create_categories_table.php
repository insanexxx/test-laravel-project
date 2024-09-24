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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Уникальный идентификатор
            $table->string('title'); // Название категории
            $table->string('slug')->unique(); // Slug для ЧПУ ссылки
            $table->nestedSet(); // Для реализации дерева категорий с помощью Nested Set
            $table->timestamps(); // Дата создания и обновления записи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
