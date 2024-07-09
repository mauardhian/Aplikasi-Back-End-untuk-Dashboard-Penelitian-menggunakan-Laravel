<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Tabel User_Priviledge
    // protected $connection =
    protected $table = 'User';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    // protected $primaryKey = 'id_author';
    // public $incrementing = false; 

    protected $fillable = [
        'id',
        'id_author',
        'username',
        'pass',
        'full_name',
        'email'
    ];

}
