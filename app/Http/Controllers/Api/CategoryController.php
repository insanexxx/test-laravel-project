<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get list of categories",
     *     @OA\Response(response="200", description="Successful response"),
     * )
     */

    // Список категорий с пагинацией
    public function index()
    {
        $categories = Category::paginate(10); // Пагинация по 10 элементов
        return response()->json($categories);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get category by ID or slug",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="404", description="Category not found")
     * )
     */

    // Получение категории по ID или slug
    public function show($id)
    {
        $category = Category::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        return response()->json($category);
    }
}
