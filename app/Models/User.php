<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telepon',
        'nomor_identitas',
        'level',
        'file_identitas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getPerusahaan()
    {
        return Perusahaan::where("user_id",$this->id)->get();
    }

    
    public function getPenanggungJawab()
    {
        $id=$this->id;
        $data = $this->getPerusahaan();
        $allid=[];
        foreach ($data as $key => $value) {
            $allid[]=$value->id;
        }
       return PenanggungJawab::whereIn("perusahaan_id",$allid)->get();
    }
    public function getPenanggungJawabId()
    {
        $data = $this->getPenanggungJawab();
        $resp = [];
        foreach ($data as $key => $value) {
            $resp[]=$value->id;
        }
        return $resp;
    }


}
