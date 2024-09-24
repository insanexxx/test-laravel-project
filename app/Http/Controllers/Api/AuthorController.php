<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="My API", version="1.0")
 */

class AuthorController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/authors",
     *     summary="Get list of authors",
     *     @OA\Response(response="200", description="Successful response"),
     * )
     */

    // Список авторов с пагинацией
    public function index()
    {
        $authors = Author::paginate(10); // Пагинация по 10 элементов
        return response()->json($authors);
    }


    /**
     * @OA\Get(
     *     path="/api/authors/{id}",
     *     summary="Get author by ID or slug",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Successful response"),
     *     @OA\Response(response="404", description="Author not found")
     * )
     */


    // Поиск автора по фамилии
    public function search(Request $request)
    {
        $query = $request->input('q'); // Получаем параметр q для поиска

        // Ищем по фамилии с учетом регистра
        $authors = Author::where('full_name', 'like', '%' . $query . '%')->paginate(10);

        return response()->json($authors);
    }

    // Получение автора по ID или slug
    public function show($id)
    {
        $author = Author::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        return response()->json($author);
    }
}
