<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'jam_masuk' => 'datetime',
        'jam_keluar' => 'datetime'
    ];
}
