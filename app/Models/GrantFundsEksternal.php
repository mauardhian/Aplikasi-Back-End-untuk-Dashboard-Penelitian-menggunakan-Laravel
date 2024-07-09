<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantFundsEksternal extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    protected $table = 'grand_funds_eksternal';
    protected $fillable=[
        'id_grant_category',
        'grant_id',
        'collaborator_name',
        'collaborator_category_id',
        'funds_approved',
        'funds_category',
        'funds_program_name'
    ];
}
