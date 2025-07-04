<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presensi extends Model
{
    
    protected $fillable = [
        'user_id',
        'status',
        'image',
        
    ];
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
