<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait; // Используем NestedSet для работы с деревьями

    // Указываем поля, которые можно массово заполнять
    protected $fillable = ['title', 'slug'];

    // Связь "Многие ко многим" с моделью Article
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}