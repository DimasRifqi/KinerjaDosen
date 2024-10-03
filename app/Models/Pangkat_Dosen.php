<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat_Dosen extends Model
{
    use HasFactory;
    protected $guarded = ['id_pangkat_dosen'];
    protected $table = 'pangkat_dosen';
    protected $primaryKey = 'id_pangkat_dosen';

    public function user(){
        return $this->hasMany(User::class, 'id_pangkat_dosen', 'id_pangkat_dosen');
    }
}
