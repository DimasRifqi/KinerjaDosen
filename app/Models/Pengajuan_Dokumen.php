<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Dokumen extends Model
{
    use HasFactory;
    
    protected $guarded = ['id_pengajuan_dokumen'];
    protected $table = 'pengajuan_dokumen';
    protected $primaryKey = ['id_pengajuan_dokumen'];
}
