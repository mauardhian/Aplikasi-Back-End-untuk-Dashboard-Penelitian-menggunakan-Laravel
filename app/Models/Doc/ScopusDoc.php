<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\sintaDaftarAuthor;

class ScopusDoc extends Model
{
    use HasFactory;

    //Tabel Scopus
    protected $connection = 'dashboard_inovasi';
    protected $table ='scopus_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_scopus_doc';
    public $incrementing = false; 

    protected $fillable = [
        'id_scopus_doc',
        'id_author',
        'quartile',
        'title',
        'publication_name',
        'creator',
        'Page',
        'issn',
        'volume',
        'cover_date',
        'cover_display_date',
        'doi',
        'citedby_count',
        'aggregation_type',
        'url'
    ];

}
