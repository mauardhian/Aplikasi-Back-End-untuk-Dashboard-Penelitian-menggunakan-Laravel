<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'name',
        'grant_id',
        'id_grant_category',
        'category',
        'tkt',
        'year',
        'description',
        'cover'
    ];
}
