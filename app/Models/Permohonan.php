<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_permohonan';
    protected $table = 'permohonan';
    protected $guarded = ['id_permohonan'];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function jabatan_fungsional(){
        return $this->belongsTo(Jabatan_Fungsional::class, 'id_jabatan_fungsional', 'id_jabatan_fungsional');
    }

    public function universitas(){
        return $this->belongsTo(Universitas::class, 'id_universitas', 'id_universitas');
    }

    public function pangkat_dosen(){
        return $this->belongsTo(Pangkat_Dosen::class, 'id_pangkat_dosen', 'id_pangkat_dosen');
    }

    public function gelar_depan(){
        return $this->belongsTo(Gelar_Depan::class, 'id_gelar_depan', 'id_gelar_depan');
    }

    public function gelar_belakang(){
        return $this->belongsTo(Gelar_Belakang::class, 'id_gelar_belakang', 'id_gelar_belakang');
    }

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function bank(){
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }
}
