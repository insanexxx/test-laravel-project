<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Указываем поля, которые можно массово заполнять
    protected $fillable = ['title', 'image', 'summary', 'text', 'author_id', 'slug'];

    // Связь "Один ко многим (обратная)" с моделью Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Связь "Многие ко многим" с моделью Category
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
