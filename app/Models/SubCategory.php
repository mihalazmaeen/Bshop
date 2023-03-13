<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_name_en',
        'subcategory_name_bengali',
        'subcategory_slug_en',
        'subcategory_slug_bengali',

    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
