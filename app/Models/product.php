<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'category_id', 'description', 'creator_id'];

    function category() {
        return $this->belongsTo(Category::class);
    }
}
