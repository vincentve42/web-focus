<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
    ];
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
