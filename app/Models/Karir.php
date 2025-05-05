<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    protected $fillable = [
        'posisi',
        'lokasi',
        'gaji',
        'tipe',
        'deskripsi'
    ];
}
