<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_jurnal extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='daftar_jurnal';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_jurnal';
    public $incrementing = false;

    protected $fillable = 
    [
        'id_master',
        'accreditation',
        'eissn',
        'issn',
        'pissn',
        'title',
        'institution',
        'publisher',
        'url_Journal',
        'url_Contact',
        'url_Editor',
        'impact_3y'
    ];

}
