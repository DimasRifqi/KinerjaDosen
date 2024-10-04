<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;

    protected $guarded = ['id_universitas'];
    protected $table = 'universitas';
    protected $primaryKey = 'id_universitas';

    public function user(){
        return $this->hasMany(User::class, 'id_universitas', 'id_universitas');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id_kota');
    }

}
