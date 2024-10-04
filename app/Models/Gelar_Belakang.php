<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelar_Belakang extends Model
{
    use HasFactory;

    protected $guarded = ['id_gelar_belakang'];
    protected $table = 'gelar_belakang';
    protected $primaryKey = 'id_gelar_belakang';

    public function user(){
        return $this->hasMany(User::class, 'id_gelar_belakang', 'id_gelar_belakang');
    }
}
