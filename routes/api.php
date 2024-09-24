<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ArticleController;


Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index']);  // Список авторов
    Route::get('/search', [AuthorController::class, 'search']); // Поиск автора по фамилии
    Route::get('/{id}', [AuthorController::class, 'show']); // Получение автора по id или slug
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Список категорий
    Route::get('/{id}', [CategoryController::class, 'show']); // Получение категории по id или slug
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']); // Список статей с фильтрацией
    Route::get('/search', [ArticleController::class, 'search']); // Поиск статьи
    Route::get('/{id}', [ArticleController::class, 'show']); // Получение статьи по id или slug
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
