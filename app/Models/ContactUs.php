<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'contact_us';
    protected $fillable = [
        'input_date',
        'sender_name',
        'Sender_institution',
        'contact_number',
        'type',
        'Subyek',
        'Content',
        'id_Grant_collaborator_category',
        'status'
    ];
}
