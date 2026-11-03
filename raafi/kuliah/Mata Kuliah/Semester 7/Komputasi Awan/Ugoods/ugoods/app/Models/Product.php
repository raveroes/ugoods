<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'condition_rating',
        'price',
        'stock',
        'status',
        'cod_location',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
