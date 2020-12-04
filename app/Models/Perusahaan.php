<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Perusahaan extends Model
{
    use HasFactory,SoftDeletes;
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
