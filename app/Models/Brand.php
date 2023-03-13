<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name_en',
        'brand_name_bengali',
        'brand_slug_en',
        'brand_slug_bengali',
        'brand_image',
    ];
}
