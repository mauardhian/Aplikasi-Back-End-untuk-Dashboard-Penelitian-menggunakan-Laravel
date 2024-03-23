<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerPage extends Model
{
    use HasFactory;

    protected $table = 'viewer_page';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';    
    protected $fillable = 
    [
        'id',
        'id_page',
        'acces_date'
    ];

}