<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

    protected $table = 'User_Log';
    protected $fillable=[
        'access_datetime',
        'expired',
        'token',
        'username',
        'ip',
        'useragent',
        'stat'
    ];
}
