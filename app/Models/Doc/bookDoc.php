<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookDoc extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='book_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_book_doc';
    public $incrementing = false; 

    protected $fillable = [
        'id_book_doc',
        'id_author',
        'category',
        'isbn',
        'title',
        'authors',
        'place',
        'publisher',
        'year'
    ];
}
