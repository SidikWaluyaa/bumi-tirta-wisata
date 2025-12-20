<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'location', 'rating', 'slug', 'price', 'price_unit', 'description', 'features', 'image', 'category'];

    protected $casts = [
        'features' => 'array',
        'rating' => 'decimal:1',
    ];
}
