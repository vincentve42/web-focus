<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'image',
        'keterangan_1',
        'keterangan_2',
        'debit',
        'kredit',
        'image',
    ];
}
