<?php

namespace App\Models\Doc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchDoc extends Model
{
    use HasFactory;

    protected $connection = 'dashboard_inovasi';
    protected $table ='research_doc';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id_research_doc_author';
    public $incrementing = false; 

    protected $fillable = [	
        'id_author',
        'id_member_research',
        'leader',
        'leader_Nidn',
        'title',
        'first_Proposed_Year',
        'proposed_Year',
        'implementation_Year',
        'focus',
        'funds_Approved',
        'scheme',
        'abbrev',
        'partner_leader_name',
        'partner_member1',
        'partner_member2',
        'partner_member3',
        'partner_member4',
        'student_thesis_title',
        'subject_title',
        'funds_total',
        'funds_category',
        'tkt',
        'sdgs_id'			
    ];
}
