<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Add this property to allow mass assignment
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'stok',
        'category_id',
        'sampul',
    ];

    // Keep your existing relationship methods below (if any)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}