<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class googleDoc extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='google_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_googlescholar';
    public $incrementing = false; 

    protected $fillable = [
        'id_googlescholar',
        'id_author',
        'id_jurnal',
        'title',
        'abstract',
        'authors',
        'journal_Name',
        'publish_Year',
        'citation',
        'url',
        'accreditation'
    ];
}
