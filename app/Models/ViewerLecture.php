<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewerLecture extends Model
{
    use HasFactory;

    protected $table = 'Viewer_Lecture';

    protected $fillable = [
        'id',
        'id_author',
        'acces_date',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author');
    }
}
