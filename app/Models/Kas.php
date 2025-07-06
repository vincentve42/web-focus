<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Kas extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'month',
        
    ];
    
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
