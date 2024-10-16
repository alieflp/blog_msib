<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',
        'category_id',
        'is_published'
    ];

    // Relasi dengan Author (Many to One)
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relasi dengan Category (Many to One)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

