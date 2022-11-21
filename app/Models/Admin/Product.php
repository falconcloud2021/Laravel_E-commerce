<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_name_en',
        'prod_description_en',
        'prod_name_ua',
        'prod_description_ua',
        'prod_slug_en',
        'prod_slug_ua',
        'price',
        'prod_rating',
        'category_id',
    ];

}
