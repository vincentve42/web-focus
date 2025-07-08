<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Notif extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
    ];
    public function user() : BelongsTo{
        return $this->belongsTo(User::class)
        
        ->where('admin',0)
        ->latest();
    }
    
}
