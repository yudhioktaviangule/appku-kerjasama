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
        
        'perusahaan_id',
    ];
    public function getPerusahaan()
    {
        return Perusahaan::where('id',$this->perusahaan_id)->first();
    }
}
