<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrantSDG extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'grantsdgs';
    protected $fillable = [
        'id_grant_category',
        'id_grant',
        'id_SDGs',
    ];

    public function grant():BelongsTo
    {
        return $this->belongsTo(ComServiceDoc::class,'id_grant','id_com_service');
    }
}
