<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategoryMapping extends Model
{
    use HasFactory;
    protected $table = 'Content_Category_Mapping';

    protected $fillable = [
        'id',
        'id_category',
        'id_article'
    ];
}
