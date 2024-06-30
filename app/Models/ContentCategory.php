<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    use HasFactory;

    // Tabel Content_Category
    // protected $connection =
    protected $table = 'Content_Category';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    // protected $primaryKey = 'id';
    // public $incrementing = false; 

    protected $fillable = [
        'id',
        'name',
        'type',
    ];
}
