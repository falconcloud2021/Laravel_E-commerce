<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name_en',
        'cat_name_ua',
        'cat_description_en',
        'cat_description_ua',
        'cat_slug_en',
        'cat_slug_ua',
        'cat_image',
        'cat_rating',
    ];
}
