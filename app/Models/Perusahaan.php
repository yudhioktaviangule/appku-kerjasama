<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'alamat',
        'jenis',
        'telepon',
        'email',
        'nomor_akta_notaris',
        'file_akta_notaris',
        'nomor_ijin_usaha',
        'file_ijin_usaha',
        'user_id',
];
}
