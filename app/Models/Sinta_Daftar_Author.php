<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinta_Daftar_Author extends Model
{
    use HasFactory;

    //Tabel Scopus
    protected $connection = 'dashboard_inovasi';
    protected $table ='Sinta_Daftar_Author';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_author';
    public $incrementing = false; 

    protected $fillable = [
        'id_master',
        'NIDN',
        'fullname',
        'country',
        'academic_grade_raw',
        'academic_grade',
        'gelar_depan',
        'gelar_belakang',
        'last_education',
        'sinta_score_v2_overall',
        'sinta_score_v2_3year',
        'sinta_score_v3_overall',
        'sinta_score_v3_3year',
        'affiliation_score_v3_overall',
        'affiliation_score_v3_3year',
    ];
}
