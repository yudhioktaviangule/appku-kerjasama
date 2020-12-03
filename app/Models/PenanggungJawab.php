<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    use HasFactory;
    protected $fillable=[
        'jabatan',
        'file_sk_jabatan',
        'nomor_sk_jabatan',
        'user_id',
        'perusahaan_id',
    ];
}
