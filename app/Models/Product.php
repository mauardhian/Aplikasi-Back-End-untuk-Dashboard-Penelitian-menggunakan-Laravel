<?php

namespace App\Models;

use App\Models\SintaDaftarAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_product';
    protected $table = 'products';
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

    public function grant():BelongsTo
    {
        return $this->belongsTo(SintaDaftarAuthor::class,'grant_id','id_author');
    }
}
