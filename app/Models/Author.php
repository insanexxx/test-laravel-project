<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // Указываем поля, которые можно массово заполнять
    protected $fillable = ['full_name', 'avatar', 'birth_year', 'bio', 'slug'];

    // Связь "Один ко многим" с моделью Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}