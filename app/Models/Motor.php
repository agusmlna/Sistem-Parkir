<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static public function getAllMotor()
    {
        return Motor::join('mereks', 'mereks.id', '=', 'motors.id_merek')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->select('motors.*', 'mereks.merek', 'jenis_motors.jenis')
            ->get();
    }
}
