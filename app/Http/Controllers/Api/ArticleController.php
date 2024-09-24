<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ArticleController extends Controller
{

    
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     summary="Get list of articles",
     *     @OA\Response(response="200", description="Successful response"),
     * )
     */
    
    // Список статей с фильтрацией по названию, категории или автору
    public function index(Request $request)
    {
        $articles = Article::query();

        // Фильтрация по названию
        if ($request->has('title')) {
            $articles->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Фильтрация по категории
        if ($request->has('category_id')) {
            $articles->whereHas('categories', function ($query) use ($request) {
                $query->where('id', $request->input('category_id'));
            });
        }

        // Фильтрация по автору
        if ($request->has('author_id')) {
            $articles->where('author_id', $request->input('author_id'));
        }

        // Пагинация и сортировка по созданию
        $articles = $articles->paginate(10);

        return response()->json($articles); // Возвращаем представление с переданными данными
    }

     /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     summary="Get article by ID or slug",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="404", description="Article not found")
     * )
     */

    // Поиск статьи по названию, категории или автору
    public function search(Request $request)
    {
        $query = $request->input('q');

        $articles = Article::where('title', 'like', '%' . $query . '%')
            ->orWhereHas('categories', function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            })
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('full_name', 'like', '%' . $query . '%');
            })
            ->paginate(10);

        return response()->json($articles);
    }

    // Получение статьи по ID или slug
    public function show($id)
    {
        $article = Article::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        return response()->json($article); // Показываем статью
    }

    
}
