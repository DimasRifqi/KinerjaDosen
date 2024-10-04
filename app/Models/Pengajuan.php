<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $guarded = ['id_pengajuan'];
    protected $table = 'pengajuan';
    protected $primaryKey = ['id_pengajuan'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'pengajuan_user', 'id_pengajuan', 'id')
            ->withPivot('status', 'tanggal_diajukan', 'tanggal_disetujui', 'tanggal_ditolak')
            ->withTimestamps();
    }

    public function pengajuan_dokumen(){
        return $this->hasMany(Pengajuan_Dokumen::class, 'id_pengajuan', 'id_pengajuan');
    }

    public function periode(){
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}