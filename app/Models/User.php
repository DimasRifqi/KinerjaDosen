<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
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

    public function pengajuan()
    {
        return $this->belongsToMany(Pengajuan::class, 'pengajuan_user', 'id', 'id_pengajuan')
            ->withPivot('status', 'tanggal_diajukan', 'tanggal_disetujui', 'tanggal_ditolak')
            ->withTimestamps();
    }
}
