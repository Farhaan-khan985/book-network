<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'isbn'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books'); // Ensure the table name is correct
    }
}
