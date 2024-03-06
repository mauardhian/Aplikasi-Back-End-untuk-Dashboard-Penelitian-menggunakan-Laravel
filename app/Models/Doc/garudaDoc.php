<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class garudaDoc extends Model
{
    use HasFactory;


    protected $connection = 'dashboard_inovasi';
    protected $table ='garuda_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_garuda_doc';
    public $incrementing = false; 

    protected $fillable = [
        'id_garuda_doc',
        'id_author',
        'id_jurnal',
        'author_order',
        'accreditation',
        'title',
        'abstract',
        'publisher_name',
        'publish_date',
        'publish_year',
        'doi',
        'citation',
        'source',
        'source_issue',
        'source_page',
        'url'
    ];
}
