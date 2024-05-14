<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UserPriviledgeMapping extends Model
{
    use HasFactory;

    // Tabel User_Priviledge
    // protected $connection =
    protected $table = 'user_priviledge_mapping';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id';
    public $incrementing = false; 

    protected $fillable = [
        'id',
        'id_user',
        'id_priviledge',
    ];

}
