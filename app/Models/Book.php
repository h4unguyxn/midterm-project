<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'isbn',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }

    // Scope để lọc theo tác giả
    public function scopeByAuthor($query, $author)
    {
        return $query->where('author', 'like', '%' . $author . '%');
    }

    // Scope để lọc theo thể loại
    public function scopeByGenre($query, $genre)
    {
        return $query->where('genre', 'like', '%' . $genre . '%');
    }

    // Scope để lọc theo tiêu đề
    public function scopeByTitle($query, $title)
    {
        return $query->where('title', 'like', '%' . $title . '%');
    }

    // Scope để tìm kiếm tổng quát
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('author', 'like', '%' . $search . '%')
              ->orWhere('genre', 'like', '%' . $search . '%')
              ->orWhere('isbn', 'like', '%' . $search . '%');
        });
    }
}