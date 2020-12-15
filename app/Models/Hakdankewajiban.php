<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Hakdankewajiban extends Model
{
    use HasFactory;
    protected $fillable=["document_id",
    'pihak',
    'jenis',
    'nilai',
    'deleted',];
}
