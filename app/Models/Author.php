<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{


    // Tambahkan atribut yang ingin diizinkan untuk mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'bio',
    ];


    // Relasi dengan User: One Author belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Post: One Author has many Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
