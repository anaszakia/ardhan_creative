<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'domisili',
        'link_porto',
        'surat_lamaran',
        'cv',
        'posisi',
        'pengalaman'
    ];
}
