<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iprDoc extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='ipr_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_ipr_doc';
    public $incrementing = false; 

    protected $fillable = [
        'id_ipr_doc',
        'id_author',
        'category',
        'requests_year',
        'requests_number',
        'title',
        'inventor',
        'patent_holder',
        'publication_date',
        'publication_number',
        'filing_date',
        'reception_Date',
        'registration_Date',
        'registration_Number'
    ];
}
