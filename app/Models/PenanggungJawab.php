<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PenanggungJawab extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'jabatan',
        'file_sk_jabatan',
        'nomor_sk_jabatan',
        'user_id',
        'perusahaan_id',
    ];
}
