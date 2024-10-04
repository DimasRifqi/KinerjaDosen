<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $guarded = ['id_kota'];
    protected $table = 'kota';
    protected $primaryKey = 'id_kota';

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }

    public function universitas(){
        return $this->hasMany(Universitas::class, 'id_kota', 'id_kota');
    }
}
