<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WosDoc extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='wos_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_wos_doc';
    public $incrementing = false; 

    protected $fillable = [
        'id_wos_doc',
        'id_author',
        'publons_id',
        'wos_id',
        'doi',
        'title',
        'first_author',
        'last_author',
        'authors',
        'publish_date',
        'journal_name',
        'citation',
        'abstract',
        'publish_type',
        'publish_year',
        'page_begin',
        'page_end',
        'issn',
        'eissn',
        'url'
    ];
}
