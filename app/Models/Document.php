<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Document extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'penanggung_jawab_id',
        'pejabat_id',
        'nomor',
        'tentang',
        'maksud_dan_tujuan',
        
        'pelaksanaan',
        'ketentuan_umum',
    ];
    public function getPenanggungJawab()
    {
        return PenanggungJawab::where("id",$this->penanggung_jawab_id)->first();
    }

    public function getPejabat()
    {
        return Pejabat::where('id',$this->pejabat_id)->first();
    }
    public function tindakanTerakhir()
    {
        return TindakLanjutDoc::where("document_id",$this->id)->orderBy('stdoc','desc')->first();
    }
}
